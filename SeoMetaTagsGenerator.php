<?php
namespace udokmeci\yii2SeoI18n;

use yii\helpers\ArrayHelper;

class SeoMetaTagsGenerator extends BaseSeoGenerator
{
    public $allowRobots=true;
    public $defaults=[
        'description'=>'',
        'keywords'=>'',
        'author'=>'',
        'distribution'=>'global',
    ];

    public $allowedTags=[
        'description',
        'keywords',
        'author',
        'distribution',
        'robots',
        'revisit-after',
    ];

    public $_all=[];

    public function init()
    {
        
        if ($this->allowRobots) {
            $robots=[
                'robots'=>'index, follow',
                'revisit-after'=>'7 day',
            ];
        } else {
            $robots=[
                'robots'=>'noindex, nofollow',
            ];
        }
        $defaults=ArrayHelper::merge($this->defaults, $robots);
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
        $view=$this->view;
        foreach ($this->_all as $name => $content) {
            if (in_array($name, $this->allowedTags)) {
                $view->registerMetaTag([
                    'name'=>$name,
                    'content'=>$content,
                ]);
            }
        }

    }
}
