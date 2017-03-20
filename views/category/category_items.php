<?php foreach ($items as $item) : ?>
    <?php echo \yii\bootstrap\Html::a(
    $item->title,
    ['/item/show/', 'id'=>$item->alias]) ?>
<?php endforeach; ?>
