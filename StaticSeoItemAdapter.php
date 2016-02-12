<?php

namespace udokmeci\yii2SeoI18n;

use yii\helpers\ArrayHelper;

abstract class StaticSeoItemAdapter extends DynamicSeoItem
{
    public $item;
    public $fields = [
        'title',
        'description',
        'keywords',
        'author',
    ];

    public function init()
    {
        $res = parent::init();
        $this->values();
        return $res;
    }

    abstract public function values();

    public function getSeoData()
    {
        $itemArray = (array) ArrayHelper::toArray($this->item->getSeoData());
        $itemValues = (array) array_intersect_key($itemArray, array_flip($this->fields));
        $thisValues = (array) ArrayHelper::toArray($this);
        $result = (object) ArrayHelper::merge($thisValues, $itemValues);
        
        return $result;
    }
}
