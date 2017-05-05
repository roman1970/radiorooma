<?php

namespace app\controllers;

use app\models\Category;
use app\models\RadioItem;
use app\models\Source;
use app\models\Theme;
use app\models\ThemeItems;
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

       // return var_dump(strstr(Yii::$app->request->referrer, Url::home(true).'item'));

        if(Yii::$app->request->referrer == Url::home(true) ||  strstr(Yii::$app->request->referrer, Url::home(true).'item')) {
            return $this->renderPartial('index', [
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
            else{*/
            return $this->render('/site/index', ['cats' => $cats, 'theme_items' => $theme_items, 'cur_item' => $item,]);
            //  }

        }

        //return $this->redirect(Url::toRoute('/'));

        //return $this->render('index', ['item' => $item]);
        //return $this->render('index');
    }
    
    public function actionAddLike(){
        if($id = (int)Yii::$app->getRequest()->getQueryParam('id')) {
            $item = RadioItem::findOne($id);
            $item->likes++;
            $item->update(false);
            return 'Понравилось: '.$item->likes;
        }
    }

    

}
