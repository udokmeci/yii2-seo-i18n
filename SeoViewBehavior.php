<?php
namespace udokmeci\yii2SeoI18n;

use Yii;
use yii\base\Behavior;
use yii\helpers\ArrayHelper;
use yii\web\View;
use yii\helpers\Html;

class SeoViewBehavior extends Behavior
{

    /* SEO Item */
    public $_item;
    public $_site;
    public $generators=[];

    public $_generators=[];
    
    public function init()
    {
        $res=parent::init();
        return $res;
    }

    public function events()
    {
        return [
            View::EVENT_AFTER_RENDER => 'afterRender',
        ];
    }

    public function setItem(SeoItemInterface $item)
    {
        $this->_item=$item;
        return $this;
    }

    public function setSite(SeoSiteInterface $site)
    {
        $this->_site=$site;
        return $this;
    }

    public function renderPart($key)
    {
        if (!isset($this->generators[$key])) {
            throw new InvalidConfigException("Unconfigured part $key");
        }
        foreach ($this->generators[$key] as $gkey => $generator) {
            $this->_generators[]= $generated = Yii::createObject(ArrayHelper::merge([
                'site'=>$this->_site,
                'item'=>$this->_item,
                'behavior'=>$this,
                'view'=>$this->owner,
            ], $generator));
            $generated->render();
        }
    }
    //favicon
    //title
    //hrefs
    //general meta tags
    //fb tags
    //twitter tags
}
