<?php

namespace qh4module\classify\models;

use qttx\helper\ArrayHelper;
use qh4module\classify\HpClassify;

/**
 * 获取tbl_classifies表的数据
 * Class Index
 * @package qh4module\classify\models
 */
class Index extends ClassifyModel
{
    /**
     * @inheritDoc
     */
    public function rules()
    {
        return parent::rules();
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        $fields = ['id', 'name', 'banner', 'icon', 'pid', 'url', 'sort', 'status'];

        $tb_set = $this->external->TableName();
        $db = $this->external->getDb();


        $sql = $db->select($fields)->from($tb_set);

        $data = $sql
            ->whereArray([
                'del_time' => 0,
            ])
            ->orderBy(['sort' => 'desc', 'name' => 'sort'])
            ->query();

        $data = HpClassify::TreeArray($data);
        $total = $db->single('SELECT FOUND_ROWS()');
        return array(
            'total' => $total,
            'list' => $data,
        );
    }

}
