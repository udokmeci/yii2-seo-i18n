<?php
namespace udokmeci\yii2SeoI18n;

use Yii;
use yii\base\Object;

abstract class BaseSeoGenerator extends Object
{
    public $item;
    public $site;
    public $behavior;
    public $view;
    abstract public function render();
}
