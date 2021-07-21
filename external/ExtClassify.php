<?php

namespace qh4module\classify\external;


use qttx\web\External;

class ExtClassify extends External
{
    /**
     * @return string 分类表
     */
    public function TableName()
    {
        return '{{%classifies}}';
    }
}