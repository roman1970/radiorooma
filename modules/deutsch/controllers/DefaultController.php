<?php

namespace app\modules\deutsch\controllers;

use yii\web\Controller;

/**
 * Default controller for the `deutsch` module
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
