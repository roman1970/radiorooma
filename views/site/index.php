<?php
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$this->title = 'Radiorooma';
?>
<div id="section_page"></div>

    <?php foreach ($cats as $cat) : ?>

    <div class="col-sm-4">
        <h3><?= $cat->name; ?></h3>
        <?= $file ?>
        <p><a class="btn" href="#">Ещё »</a></p>
    </div>

    <?php endforeach; ?>

<?php // \yii\bootstrap\Html::a("Обновить", ['/item/categoryitems/1'], ['class' => 'btn btn-lg btn-primary']) ?>

</div><!--/row-->
</div><!--/span-->

<?php //<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation"> ?>
    <div class="list-group">

        <?php Pjax::begin(['id' => 'section_page']); ?>

        <?php foreach ($cats as $cat) : ?>
            <?php echo \yii\bootstrap\Html::a(
                $cat->name,
                '/category/'.$cat->id) ?>
            <?php /*

            <a href="/item/categoryitems/<?=$cat->id?>" class="list-group-item"><?=$cat->name?></a>
            <?= \yii\bootstrap\Html::a("Обновить", ['/item/categoryitems/'.$cat->id], ['class' => 'btn btn-lg btn-primary']) ?>
            */?>

        <?php endforeach;  ?>
        <?php Pjax::end(); ?>

      