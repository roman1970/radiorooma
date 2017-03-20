<?php
namespace app\controllers;

use app\models\Category;
use app\models\RadioItem;
use yii\web\Controller;
use Yii;
use yii\helpers\Url;

class CategoryController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        $cats = Category::find()->all();
       
        return $this->render('index', ['cats' => $cats]);
    }

    /**
     * Создание корневой категории
     * @return string
     */
    public function actionCreate()
    {

        $model = new Category();

        if($model->load(Yii::$app->request->post())){
            if (Yii::$app->request->post('Categories')['rootCat'] === '') {
                $model = new Category(['name' => Yii::$app->request->post('Category')['name'],
                    ]
                );

                $model->makeRoot();

            }

            else {
                $model = new Category(['name' => Yii::$app->request->post('Categories')['name'],
                    ]
                );
                $rootCategory = Category::find()
                    ->where(['id' => Yii::$app->request->post('Categories')['rootCat']])
                    ->one();
                //var_dump(Yii::$app->request->post('Categories')); exit;
                $model->prependTo($rootCategory);

            }
            return $this->redirect(Url::toRoute('category/index'));
        }
        else {
            return $this->render('_form', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Редактирование категории
     * @param $id
     * @return string
     * @throws \yii\web\HttpException
     */
    public function  actionUpdate($id){

        $model = $this->loadModel($id);

        if($model->load(Yii::$app->request->post())){

                $model->name = Yii::$app->request->post('Categories')['name'];
                $model->title = Yii::$app->request->post('Categories')['title'];
                $model->site_id = Yii::$app->request->post('Categories')['site_id'];
                $model->update();


            return $this->redirect(Url::toRoute('categories/index'));
        }
        else {
            return $this->render('_form', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Удаляет категорию
     * @param $id
     * @return \yii\web\Response
     * @throws \yii\web\HttpException
     */
    public function actionDelete($id)
    {

        if($model=$this->loadModel($id)->delete()){
            $cats = Categories::find()->all();

            return $this->render(['index', ['cats' => $cats]]);
        } else {
            throw new \yii\web\HttpException(404,'Cant delete record.');
        };


    }

    public function actionItems($id){

        $items = RadioItem::find()->where(['cat_id' => $id])->all();

        return $this->renderPartial('category_items', ['items' => $items]);

    }

    /**
     * Загружает запись модели текущего контроллера по айдишнику
     * @param $id
     * @return null|static
     * @throws \yii\web\HttpException
     */
    public function loadModel($id)
    {

        $model=Categories::findOne($id);

        if($model===null)
            throw new \yii\web\HttpException(404,'The requested page does not exist.');
        return $model;
    }

}