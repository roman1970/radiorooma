<?php

namespace app\controllers;

use app\models\Category;
use app\models\RadioItem;
use app\models\Source;
use app\models\Theme;
use app\models\ThemeItems;
use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ItemController extends Controller
{
    public $layout = 'test';
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
        /**
         * @var $item RadioItem
         * @var $item_tags array
         */
        $item = RadioItem::find()
            ->where(['alias' => $alias])
            ->one();

        $kvns_films = RadioItem::find()->where('cat_id = 13 and cat_id = 17')->all();

        $kvn = $kvns_films[rand(0,count($kvns_films)-1)];

        $pics = RadioItem::find()->where('cat_id = 22')->all();

        $pic = $pics[rand(0,count($pics)-1)];

        return $this->render('/site/room', [
            'item' => $item,
            'pic' => $pic,
            'kvn' => $kvn
            //'referrer' => $referrer,
            //'url' => $home_url
        ]);

        /*

        if(Yii::$app->request->referrer == Url::home(true) ||  strstr(Yii::$app->request->referrer, Url::home(true).'item')) {
            return $this->renderPartial('/site/room', [
                'item' => $item,
                //'referrer' => $referrer,
                //'url' => $home_url
            ]);
        }

        else{
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
            else{
            return $this->render('/site/index', ['cats' => $cats, 'theme_items' => $theme_items, 'cur_item' => $item,]);
            //  }

        }

        //return $this->redirect(Url::toRoute('/'));

        //return $this->render('index', ['item' => $item]);
        //return $this->render('index');
    */
    }

    public function actionItem($id){

        $item = $this->loadModel($id);

        return $this->renderPartial('item', ['item' => $item]);

    }

    public function actionRandItem(){

        $items = RadioItem::find()->where('cat_id <> 13 and cat_id <> 17 and cat_id <> 18 and cat_id <> 19 and cat_id <> 19 ')->all();

        $item = $items[rand(0,count($items)-1)];

        return $this->renderPartial('item', ['item' => $item]);

    }

    
    public function actionAddLike(){
        if($id = (int)Yii::$app->getRequest()->getQueryParam('id')) {
            $item = RadioItem::findOne($id);
            $item->likes++;
            $item->update(false);
            return 'Понравилось: '.$item->likes;
        }
    }

    public function loadModel($id)
    {
        $model=RadioItem::findOne($id);
        if($model===null)
            throw new \yii\web\HttpException(404,'The requested page does not exist.');
        return $model;
    }

    

}
