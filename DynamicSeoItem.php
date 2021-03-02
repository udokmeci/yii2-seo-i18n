<?php

namespace udokmeci\yii2SeoI18n;

use yii\base\BaseObject;

class DynamicSeoItem extends BaseObject implements SeoItemInterface
{
    public $description;
    public $keywords;
    public $title;
    public $author;
    public $canonicalUrl;
    public function getSeoData()
    {
        return $this;
    }
}
