<?php

namespace qh4module\classify;

use qh4module\classify\external\ExtClassify;

use qttx\web\ResponseTrait;

class HpClassify
{
    use ResponseTrait;

    /**
     * 获取所有子集
     * @param $id
     * @param ExtClassify|null $external
     * @param string $id_field
     * @param string $parent_field 父级标识（默认 pid）
     * @param string $child_sign 子集数组键名 默认 subset
     * @return mixed
     */
    public static function getAllSubset($id, ExtClassify $external = null, string $id_field = 'id', string $parent_field = 'pid', string $child_sign = 'subset')
    {
        if (!$id) {
            return (new self)->RE('未传递 id 参数！');
        }

        if ($external === null) {
            $external = new ExtClassify();
        }
        $data = self::generateTree($external, $id_field, $parent_field, $child_sign);
        if (!$data) {
            return (new self)->RE('未查询到相关子集！');
        }

        foreach ($data as $k => $v) {
            if ($v['id'] == $id) {
                return $v;
            }
            return (new self)->RE('未查询到相关子集！');
        }
    }

    /**
     * 生成无限极数据结构 适用于无外键关联的数据表
     * @param ExtClassify|null $external
     * @param string $id_field
     * @param string $parent_field 父级标识（默认 pid）
     * @param string $child_sign 子集数组键名 默认 subset
     * @return array
     */
    public static function generateTree(ExtClassify $external = null, string $id_field = 'id', string $parent_field = 'pid', string $child_sign = 'subset'): array
    {
        if ($external === null) {
            $external = new ExtClassify();
        }

        $table_name = $external->TableName();
        $data = $external->getDb()->select()->from($table_name)->query();
        if (!$data) {
            return (new self)->RE('未查询到相关子集！');
        }

        return self::TreeArray($data, $id_field, $parent_field, $child_sign);
    }

    /**
     * 生成无限极数组结构 -- &引用
     * 初始数组结构 包含键 id、pid
     * @param $data
     * @param string $id_field
     * @param string $parent_field 父级标识 默认 pid
     * @param string $child_sign 子集数组键名 默认 subset
     * @return array
     */
    public static function TreeArray($data, string $id_field = 'id', string $parent_field = 'pid', string $child_sign = 'subset'): array
    {
        $items = array();
        foreach ($data as $v) {
            $items[$v[$id_field]] = $v;
        }
        $tree = array();
        foreach ($items as $k => $item) {
            if (isset($items[$item[$parent_field]])) {
                $items[$item[$parent_field]][$child_sign][] = &$items[$k];
            } else {
                $tree[] = &$items[$k];
            }
        }
        return $tree;
    }

}
