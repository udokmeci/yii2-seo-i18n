<?php
namespace udokmeci\yii2SeoI18n;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class LinksGenerator extends BaseSeoGenerator
{
    public $locale_param='locale';
    public $defaults=[
        'canonical'=>'',
        'icon'=>'',
    ];

    public $_all=[];

    public function init()
    {
        $this->_all=
        ArrayHelper::merge(
            $this->defaults,
            $this->site->getSeoData(),
            (array)$this->item->getSeoData()
        );
        return parent::init();
    }

    public function render()
    {
        $outputs='';
        foreach ($this->site->getSeoLocales() as $locale => $name) {
            $outputs.='<link rel="alternate" hreflang="'. $locale .'" href="'. Url::to(['/'.\Yii::$app->requestedRoute] + ['locale' => $locale] + \Yii::$app->getRequest()->getQueryParams(), true) .'" />';
        }

        $outputs.='<link rel="alternate" hreflang="x-default" href="'. Url::to(['/'.\Yii::$app->requestedRoute]  + ['locale' => $this->site->getSeoData()->defaultLocale ] + \Yii::$app->getRequest()->getQueryParams(), false).'" />';
        if (isset($this->item->getSeoData()->canonicalUrl)) {
            $outputs.='<link rel="canonical" href="'. $this->item->getSeoData()->canonicalUrl .'" />';
        }

        if (isset($this->site->getSeoData()->icon)) {
            $outputs.='<link rel="shortcut icon" type="image/x-icon" href="'. $this->site->getSeoData()->icon .'" />';
        }

        return $outputs;
    }
}
