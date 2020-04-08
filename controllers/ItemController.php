<?php

namespace app\controllers;

use app\models\Category;
use app\models\CleverAnswer;
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

        if($item->cat_id == 23){
            $answers = CleverAnswer::find()->where(['item_id' => $item->id])->all();
            shuffle($answers);
            return $this->render('clever',  ['item' => $item, 'ans' => $answers]);
        }



        $tags = explode(',', $item->tags);


        $random_tag = trim($tags[rand(0,count($tags)-1)]);
        //var_dump($random_tag); exit;


        $kvns_films = RadioItem::find()
            ->where('cat_id = 13 or cat_id = 17')
            ->andWhere("tags LIKE '%$random_tag%'")
            ->all();
        if(!$kvns_films)
            $kvns_films = RadioItem::find()
                ->where('cat_id = 13 or cat_id = 17')
                ->all();
        /*
        $query = RadioItem::find()
            ->where('cat_id = 13 or cat_id = 17')
            ->andWhere("tags LIKE '%$random_tag%'");

        var_dump($query->prepare(Yii::$app->db->queryBuilder)->createCommand()->rawSql); exit;
        */

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

    public function actionTestAnswer()
    {
        if($answer_id = (int)Yii::$app->getRequest()->getQueryParam('answer_id')) {
            if ($item_id = (int)Yii::$app->getRequest()->getQueryParam('item_id')) {
                $answer = CleverAnswer::findOne($answer_id);
                $item = RadioItem::findOne($item_id);
                if ($answer->right) {
                    return $this->renderPartial('clever_klar', ['item' => $item, 'resp' => 'Правильно!']);
                }
                return $this->renderPartial('clever_klar', ['item' => $item, 'resp' => 'Не Правильно!']);
            } else return 'ошибка';
        }

    }

    public function actionItem($id){

        $item = $this->loadModel($id);

        return $this->renderPartial('item', ['item' => $item]);

    }

    public function actionRandItem(){

        /*
        $items = RadioItem::find()->where('cat_id <> 13 and cat_id <> 17 and cat_id <> 18 and cat_id <> 19 and cat_id <> 19 ')->all();

        $item = $items[rand(0,count($items)-1)];
        */

        $items = RadioItem::find()
            ->where('cat_id <> 13 and cat_id <> 17 and cat_id <> 18 and cat_id <> 19 and cat_id <> 22')->all();
        $imgs = RadioItem::find()
            ->where('cat_id = 22')->all();

        $item = $items[rand(0,count($items)-1)];
        $img = $imgs[rand(0,count($imgs)-1)];

        return $this->renderPartial('item', ['item' => $item, 'img' => $img]);

    }

    public function actionRandImgItem(){
        $imgs = RadioItem::find()
            ->where('cat_id = 22')->all();

        $img = $imgs[rand(0,count($imgs)-1)];

        return $this->renderPartial('img', ['img' => $img]);
    }

    public function actionRandImgSrc()
    {
        $imgs = RadioItem::find()
            ->where('cat_id = 22')->all();

        $img = $imgs[rand(0,count($imgs)-1)];

        return $img->img;

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
