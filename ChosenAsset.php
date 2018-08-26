<?php
namespace fatjiong\chosen;

use yii\web\AssetBundle;

class ChosenAsset extends AssetBundle
{
    public $css = [
        'assets/css/chosen.css',
    ];

    public $js = [
        'assets/js/chosen.jquery.js',
    ];
    public $jsOptions = [
        'charset' => 'utf8',
    ];

    public function init()
    {
        //资源所在目录
        $this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR;
    }
}
