<?php

namespace app\modules\radio\controllers;

use yii\web\Controller;

/**
 * Default controller for the `radio` module
 */
class DefaultController extends Controller
{
    public $layout = 'test';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
