<?php
/**
 * @var \app\models\RadioItem $item
 */
?>
<div class="container" style="text-align: center">
    <h2><?=$item->title?></h2>
    <h5><p><?=$item->cat->name?></p></h5>
    <h3><p><?=$item->anons?></p></h3>
    <?php if($item->audio) : ?>
    <audio controls>
        <source src="/uploads/<?=$item->audio?>">
    </audio>
    <?php endif; ?>
    <?php if($item->cat_id != 22) : ?>
        <p><?=nl2br($item->text)?></p>
    <?php else: ?>
        <img src="<?=$item->img ?>"/>
    <?php endif; ?>
    <p><a href="<?= \yii\helpers\Url::home();?>"> Радио </a>

</div>
