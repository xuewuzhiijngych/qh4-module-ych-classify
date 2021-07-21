<?php

namespace qh4module\classify\models;

use qttx\helper\ArrayHelper;

/**
 * tbl_classifies表删除一条数据（软删除）
 * Class Delete
 * @package qh4module\classify\models
 */
class Delete extends ClassifyModel
{
    /**
     * @var int 接收参数,必须：ID
     */
    public $id;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return ArrayHelper::merge([
            ['id', 'required']
        ], parent::rules());
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        $this->external->getDb()
            ->update($this->external->TableName())
            ->col('del_time', time())
            ->whereArray(['id' => $this->id])
            ->query();
        return true;
    }
}