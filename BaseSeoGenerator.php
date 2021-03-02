<?php
namespace udokmeci\yii2SeoI18n;

use Yii;
use yii\base\BaseObject;

abstract class BaseSeoGenerator extends BaseObject
{
    public $item;
    public $site;
    public $behavior;
    public $view;
    abstract public function render();
}
