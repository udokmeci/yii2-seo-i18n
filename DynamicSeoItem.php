<?php

namespace udokmeci\yii2SeoI18n;

use yii\base\Object;

class DynamicSeoItem extends Object implements SeoItemInterface
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
