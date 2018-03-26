<?php
namespace app\modules\deutsch\assets;

use yii\web\AssetBundle;

/**
* @author Qiang Xue <qiang.xue@gmail.com>
* @since 2.0
*/
class DeutschAsset extends AssetBundle
{
    public $sourcePath = "@moduleDeutsch/web/";

    public $css = ['css/style.css'];

    public $js = [

    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'app\assets\AppAsset'
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

}
