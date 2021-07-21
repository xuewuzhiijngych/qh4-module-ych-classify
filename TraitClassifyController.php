<?php

namespace qh4module\classify;

use qh4module\classify\external\ExtClassify;
use qh4module\classify\models\Index;
use qh4module\classify\models\Create;
use qh4module\classify\models\Update;
use qh4module\classify\models\Delete;

/**
 * 无限极分类
 * Trait TraitClassifyController
 * @package qh4module\classify
 */
trait TraitClassifyController
{

    public function ext_classify()
    {
        return new ExtClassify();
    }


    /**
     * 列表
     * @return array
     */
    public function actionIndex()
    {
        $model = new Index([
            'external' => $this->ext_classify(),
        ]);
        return $this->runModel($model);
    }

    /**
     * 新增
     * @return array
     */
    public function actionCreate()
    {
        $model = new Create([
            'external' => $this->ext_classify(),
        ]);
        return $this->runModel($model);
    }

    /**
     * 更新
     * @return array
     */
    public function actionUpdate()
    {
        $model = new Update([
            'external' => $this->ext_classify(),
        ]);
        return $this->runModel($model);
    }

    /**
     * 删除
     * @return array
     */
    public function actionDelete()
    {
        $model = new Delete([
            'external' => $this->ext_classify(),
        ]);
        return $this->runModel($model);
    }
}