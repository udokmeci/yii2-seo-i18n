<?php
namespace udokmeci\yii2SeoI18n;

use yii\helpers\Html;

class TitleGenerator extends BaseSeoGenerator
{
    public $seperator = ' - ';
    public function render()
    {
        return Html::tag('title', implode($this->seperator, [$this->item->getSeoData()->title, $this->site->getSeoData()->title]));
    }
}
