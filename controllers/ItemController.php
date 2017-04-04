<?php

namespace app\controllers;

use app\models\Category;
use app\models\RadioItem;
use app\models\Source;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ItemController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($alias='')
    {
        //return var_dump($alias);
        $item = RadioItem::find()
            ->where(['alias' => $alias])
            ->one();

        //return var_dump($item);

        if(Yii::$app->request->referrer == Url::home(true)) {
            return $this->renderPartial('index', [
                'item' => $item,
                //'referrer' => $referrer,
                //'url' => $home_url
            ]);
        }

        //return $this->redirect(Url::toRoute('/'));

        return $this->render('index', ['item' => $item]);
        //return $this->render('index');
    }

    

}
