<?php

namespace qh4module\classify\models;


use qttx\helper\ArrayHelper;

/**
 * tbl_classifies表新增一条数据
 * Class Create
 * @package qh4module\classify\models
 */
class Create extends ClassifyModel
{

    /**
     * @var string 接收参数,必须：名称
     */
    public $name;

    /**
     * @var string 接收参数,非必须：banner
     */
    public $banner;

    /**
     * @var string 接收参数,非必须：图标
     */
    public $icon;

    /**
     * @var int 接收参数,必须：父级ID
     */
    public $pid = 0;

    /**
     * @var string 接收参数,非必须：跳转url
     */
    public $url;

    /**
     * @var int 接收参数,必须：排序
     */
    public $sort = 0;

    /**
     * @var int 接收参数,必须：状态：0-禁用，1-正常
     */
    public $status = 1;


    /**
     * @inheritDoc
     */
    public function rules()
    {
        return ArrayHelper::merge([
            [['name', 'pid', 'sort', 'status'], 'required']
        ], parent::rules());
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        $table_name = $this->external->TableName();

        \QTTX::$app->db->insert($table_name)
            ->cols([
                'name' => $this->name,
                'banner' => $this->banner,
                'icon' => $this->icon,
                'pid' => $this->pid,
                'url' => $this->url,
                'sort' => $this->sort,
                'status' => $this->status,
            ])
            ->query();
        return true;
    }
}