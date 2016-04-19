<?php

namespace udokmeci\yii2SeoI18n;

use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;

class SocialMetaTagsGenerator extends BaseSeoGenerator
{
    public $prefix;
    public $attribute;
    public $allowedTags = [

    ];

    public $defaults = [
        'title' => '',
        'type' => '',
        'description' => '',
        'image' => '',
        'url' => '',
    ];
    
    
    public  $globals = [
    ];

    public $_all = [];

    public function init()
    {
        if (!$this->prefix) {
            throw new InvalidConfigException('Please override prefix attribute', 1);
        }
        if (!$this->attribute) {
            throw new InvalidConfigException('Please override meta tag attribute', 1);
        }

        if (!$this->allowedTags) {
            $this->allowedTags = ArrayHelper::merge(array_keys($this->defaults), array_keys($this->globals));
        }
        $defaults = ArrayHelper::merge($this->defaults, $this->globals);
        $this->_all = array_filter(
            ArrayHelper::merge(
                $defaults,
                $this->site->getSeoData(),
                (array) $this->item->getSeoData()
            )
        );

        return parent::init();
    }

    public function render()
    {
        $view = $this->view;
        foreach ($this->_all as $name => $content) {
            if (in_array($name, $this->allowedTags)) {
                $view->registerMetaTag([
                    $this->attribute => implode(':', [$this->prefix, $name]),
                    'content' => $content,
                ]);
            }
        }
    }
}
