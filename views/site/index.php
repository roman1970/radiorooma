
<style>
    .theme{
        text-align: center;
        box-shadow: inset 0 0 6px;
        border-radius: 5px;
       /* height: 200px;
        overflow: auto;*/
    }
    #section_page{
        text-align: center;
       /* overflow: auto;
        height: 200px;*/
        background-color: rgb(72, 73, 74);
        opacity: 0.8;
    }
    .accord{
        text-align: center;
        cursor: pointer;
    }
</style>

<?php
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$this->title = 'Radiorooma';
?>

<?php /*
<div class="col-sm-3">
    <?php Pjax::begin(['id' => 'section_page_2']); ?>


    <?php foreach ($cats as $cat) : ?>
        <?php echo \yii\bootstrap\Html::a(
            $cat->name,
            '/category/'.$cat->id) ?>
        <?php /*

            <a href="/item/categoryitems/<?=$cat->id?>" class="list-group-item"><?=$cat->name?></a>
            <?= \yii\bootstrap\Html::a("Обновить", ['/item/categoryitems/'.$cat->id], ['class' => 'btn btn-lg btn-primary']) ?>


    <?php endforeach;  ?>
    <?php Pjax::end();

</div>
 */ ?>

<div class="col-sm-8 theme">
    <div id="section_page">
        <?php /*<h4>Добро пожаловать в ротацию нашего Радио</h4>
        <input type="text" class="form-control" id="text"  placeholder="Ваша почта">
        <button type="button" class="btn btn-success">Отправить письмо с инструкциями</button>

        <p id="all_nenor">
            <button type="button" class="btn btn-success" onclick="onRadio('test_mp3')" >
                Программа "МузЫки Без Границ" <br> Осторожно! Ненормативная лексика!
            </button>
        </p>
        <p id="all_cenz">
            <button type="button" class="btn btn-success" onclick="onRadio('second_mp3')" >
                Программа "От Шуберта до Шнурова <br> не добираясь"
            </button>
        </p>
        <p id="all_bard">
            <button type="button" class="btn btn-success" onclick="onRadio('bard_mp3')" >
                Программа "Естественное и безобразное" <br> с участием Барда, который перевернул ЗИЛ
            </button>
        </p>
  */?>


    </div>
</div>

<div class="col-sm-4 accord">

    <?php foreach ($theme_items as $theme => $items) : ?>


        <h6><?= $theme ?></h6>
        <?php Pjax::begin(['id' => 'section_page']); ?>
        <?php foreach ($items as $item) : $one = \app\models\RadioItem::findOne((int)$item->item_id); ?>

            <p>
                <?=\yii\bootstrap\Html::a(
                    $one->title,
                    '/item/'.$one->alias, ['cursor' => 'pointer']) ?>
            </p>

        <?php endforeach; ?>
        <?php Pjax::end(); ?>


    <?php endforeach; ?>

</div>


<?php // \yii\bootstrap\Html::a("Обновить", ['/item/categoryitems/1'], ['class' => 'btn btn-lg btn-primary']) ?>

</div><!--/row-->
</div><!--/span-->


<?php //<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation"> ?>
    <div class="list-group">



      