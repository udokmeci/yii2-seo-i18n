<?php
namespace udokmeci\yii2SeoI18n\widgets;

use yii\base\Widget;

/**
*
*/
class GooglePreviewWidget extends Widget
{

    public $item;
    public $viewFile='@udokmeci/yii2SeoI18n/widgets/google-preview';

    public function run()
    {
        $this->view->registerCss(
            <<<CSS
<style>
.g,  .std, .c .cpbb, .kpbb, .kprb, .kpgb, .kpgrb, .ksb {
    font-family: arial,sans-serif;
    background: white;
}
.g {
    margin-top: 0;
    margin-bottom: 23px;
    padding:10px;
    background-color: white;
}
.g {
    font-size: small;
    font-family: arial,sans-serif;
}
.g {
    line-height: 1.2;
    text-align: left;
}
.rc {
    position: relative;

}
.rc h3 {
    font-size: 18px;
}
.rc .s {
    line-height: 18px;
}

.s {
    color: #545454;
}
.s {
    max-width: 42em;
}
.rc .kv {
    height: 17px;
    line-height: 16px;
}
.g.f,.g .f a:link {
    color: #808080;
}
.g .kv,.g .slp {
    display: block;
}
.g .f,.g .f a:link,.g .m {
    color: #666;
}
.g .st {
    line-height: 1.4;
    word-wrap: break-word;
}
.g ._Rm {
    font-size: 14px;
}
.g .a,.g cite,.g cite a:link,.g cite a:visited,.g .cite,.g .cite:link,.g #_bGc>i, .bc a:link {
    color: #006621;
    font-style: normal;
}

CSS
        );
        return $this->render($this->viewFile, (array)$this->item->getSeoData());
    }
}
