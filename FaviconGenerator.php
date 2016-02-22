<?php
namespace udokmeci\yii2SeoI18n;

use yii\helpers\Html;

class FaviconGenerator extends BaseSeoGenerator
{

    /**
     * @return string
     */
    public function render()
    {
        return Html::tag('title', implode($this->seperator, [$this->item->getSeoData()->title, $this->site->getSeoData()->title]));
    }
}
