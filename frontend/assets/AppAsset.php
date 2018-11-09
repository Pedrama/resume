<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'css/vendor/bootstrap/css/bootstrap.min.css',
        'css/vendor/bootstrap/css/bootstrap-rtl.min.css',
        'css/vendor/font-awesome/css/font-awesome.min.css',
        'css/vendor/devicons/css/devicons.min.css',
        'css/vendor/simple-line-icons/css/simple-line-icons.css',

        'css/font.css',
        'css/resume.min.css',
        'css/site.css',
    ];
    public $js = [

        'css/vendor/jquery/jquery.min.js',
        'css/vendor/bootstrap/js/bootstrap.bundle.min.js',
        'css/vendor/jquery-easing/jquery.easing.min.js',
        'css/js/resume.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
