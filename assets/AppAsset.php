<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/jquery.auto-complete.css',
        'css/font-awesome.css'
    ];

    public $js = [
        '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js',
        'js/jquery.auto-complete.min.js',
        'js/fingerprint2.min.js',
        'js/jquery.cookie.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

}
