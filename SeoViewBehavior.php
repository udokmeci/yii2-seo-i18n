<?php
namespace udokmeci\yii2SeoI18n;

use Yii;
use yii\base\Behavior;
use yii\helpers\ArrayHelper;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\InvalidConfigException;

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
            View::EVENT_END_BODY => 'registerMicroData',
        ];
    }

    public function setItem(SeoItemInterface $item)
    {

        $this->_item=$item;
        return $this;
    }
    
    public function getItem()
    {

        return $this->_item;
    }
    
    public function registerMicroData()
    {
        if($this->_item instanceof MicroDataInterface)
        {
            $microData= $this->_item->getMicroData();
            echo Html::tag('script',Json::encode($microData),['type'=>'application/ld+json']);
        }
        
    }
    

    public function setSite(SeoSiteInterface $site)
    {
        $this->_site=$site;
        return $this;
    }

    public function renderPart($key)
    {
        $outputs='';
        try {


            if (!isset($this->_item)) {
                throw new InvalidConfigException("Seo Item is not set");
            }
            if (!isset($this->_site)) {
                throw new InvalidConfigException("Seo Site is not set");
            }
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
                $outputs.=$generated->render();
            }
        } catch (\Exception $e) {

            throw $e;

        }
        return $outputs;
    }
    //favicon
    //title
    //hrefs
    //general meta tags
    //fb tags
    //twitter tags
}
