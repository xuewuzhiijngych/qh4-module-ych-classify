QH4框架扩展模块-无限极分类模块

### 功能

1、无限极分类模块，商品分类.....

### 助手方法
```php
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
    }
    
    使用示例：
    ①
    use qh4module\classify\HpClassify;
    $ext = new ExtClassify();
    return HpClassify::getAllSubset($_POST['id'],$ext);
    ②
    use qh4module\classify\HpClassify;
    $ext = new ExtClassify();
    return HpClassify::generateTree($ext);
    ③
    use qh4module\classify\HpClassify;
    $res = HpClassify::generateTree($data);

    注意：
    方法中的可选参数，参考注释传递
```

### 方法列表

```php
    /**
     * 分类列表
     * @return array
     */
    public function actionIndex()
    {
    }
```

```php
    /**
     * 新增
     * @return array
     */
    public function actionCreate()
    {
    }
```

```php
    public function actionUpdate()
    {
    }
```

```php
    public function actionDelete()
    {
    }
```