<?php

namespace app\controllers;

use app\models\Category;
use app\models\RadioItem;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $cats = Category::find()->all();
        $items = RadioItem::find()->all();
        //$this->redirect(Yii::$app->request->referrer);
        //$file = file("http://37.192.187.83:10088/ices.vclt");
        //$file = file($file);

      
        return $this->render('index', ['cats' => $cats, 'items' => $items, 'file' => file("http://37.192.187.83:10088/ices.vclt") ?
                              substr(file("http://37.192.187.83:10088/ices.vclt")[1],6) : '']);
        //return $this->render('index');
    }
    
    
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    function actionGetItemByLink(){
        $current_track = file("http://37.192.187.83:10088/ices.vclt") ?
            substr(file("http://37.192.187.83:10088/ices.vclt")[1],6) : 'Радио-блог Комната с мехом';
       /*
        $item_title = RadioItem::find()->where('" audio LIKE "%'.$current_track.'%"')->one();

        if($item_title){
            return "document.getElementById('rand').innerHTML = '".$item_title->title."';";
            //return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
        };
       */
        

        if($current_track){
            return "document.getElementById('rand').innerHTML = '".trim($current_track)."';";
            //return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
        };
        //return "document.getElementById('rand').innerHTML = 'Доброго Вам Времени!';";
        return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
    }
    
}
