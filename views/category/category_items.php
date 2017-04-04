<?php foreach ($items as $item) : ?>
    <?php echo \yii\bootstrap\Html::a(
    $item->title,
    '/item/'.$item->alias) ?>
    <?php //var_dump($referrer); ?>
    <?php //var_dump($url); ?>
<?php endforeach; ?>
