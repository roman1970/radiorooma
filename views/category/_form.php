<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */


$this->title = 'Добавить категорию';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>



    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <?php $form = ActiveForm::begin(['id' => 'category-form']); ?>

            <?= $form->field($model, 'name')->textInput()  ?>

            <?= $form->field($model, 'rootCat')->dropDownList(ArrayHelper::map(\app\models\Category::find()->all(),'id','name'),
                ['prompt' => 'Это корневая категория'])  ?>
            <div class="form-group">
                <?= Html::submitButton('Создать', ['class' => 'btn btn-primary', 'name' => 'category-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
</div>
