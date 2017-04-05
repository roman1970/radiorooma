<?php

namespace app\controllers;

use app\models\Category;
use app\models\RadioItem;
use app\models\Theme;
use app\models\ThemeItems;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
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
        $theme_items = [];
        $cats = Category::find()->all();
        // $items = RadioItem::find()->all();
        $themes = Theme::find()->all();

        foreach ($themes as $theme) {
            $theme_items[$theme->title] = ThemeItems::find()->where(['theme_id' => $theme->id])->all();
        }

        //shuffle($theme_items);
        //return var_dump($theme_items);
       // echo Yii::$app->request->referrer; exit;
        /*if(Yii::$app->request->referrer != Url::home(true)) {
            return $this->renderPartial('index', ['cats' => $cats, 'theme_items' => $theme_items]);
        }
        else{*/
            return $this->render('index', ['cats' => $cats, 'theme_items' => $theme_items]);
      //  }


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
            substr(file("http://37.192.187.83:10088/ices.vclt")[1],6) : "Скоро возобновление трансляции";

        //$item_title = RadioItem::find()->where(' audio LIKE "%krepche-russkogo-ivana%"')->one();
        $item = RadioItem::find()->where(['like', 'audio', trim(substr($current_track, -10))])->one();
        //return var_dump(substr($current_track, -10));

        if($item){
            return "document.getElementById('rand').innerHTML = '".$item->category->name." :: ".addslashes($item->anons)." :: ".$item->title."';";
            //return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
        };

        if($current_track){
            return "document.getElementById('rand').innerHTML = '".trim($current_track)."';";
            //return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
        };
        //return "document.getElementById('rand').innerHTML = 'Доброго Вам Времени!';";
        return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
    }

    function actionGetItemText(){
        $current_track = file("http://37.192.187.83:10088/ices.vclt") ?
            substr(file("http://37.192.187.83:10088/ices.vclt")[1],6) : "Скоро возобновление трансляции";

        //$item_title = RadioItem::find()->where(' audio LIKE "%krepche-russkogo-ivana%"')->one();
        $item = RadioItem::find()->where(['like', 'audio', trim(substr($current_track, -10))])->one();
        //return var_dump(substr($current_track, -10));

        if($item){
            return "document.getElementById('section_page').innerHTML = '".nl2br(addslashes($item->text))."';";
            //return var_dump(file_get_contents("http://37.192.187.83:10088/ices.vclt"));
        };
    }
    
}
