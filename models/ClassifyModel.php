<?php

namespace qh4module\classify\models;

use qttx\web\ServiceModel;

class ClassifyModel extends ServiceModel
{
    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'sort', 'status', 'del_time'], 'integer'],
            [['name', 'banner', 'icon'], 'string', ['max' => 100]],
            [['url'], 'string', ['max' => 255]]
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributeLangs()
    {
        return [
            'id' => 'id',
            'name' => '名称',
            'banner' => 'banner',
            'icon' => '图标',
            'pid' => '父级ID',
            'url' => '跳转url',
            'sort' => '排序',
            'status' => '状态：0-禁用，1-正常',
            'del_time' => '软删除'
        ];
    }
}