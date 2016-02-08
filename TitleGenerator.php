<?php
namespace udokmeci\yii2SeoI18n;

use yii\helpers\Html;

class TitleGenerator extends BaseSeoGenerator
{
    public function render()
    {
        return implode(' - ', [$this->item->getSeoData()->title, $this->item->getSeoData()->title]);
    }
}
