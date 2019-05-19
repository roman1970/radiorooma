<?php
/**
 * @var \app\models\RadioItem $item
 * @var \app\models\RadioItem $pic
 */
?>
<style>
    .pic{
        width: 80%;
    }
</style>
<div class="container" style="text-align: center">
    <h2><img src='<?=\yii\helpers\Url::to('/img/barded2.png')?>' width="70px" id="player" class="bard_img"><span><?=$item->title?></span></h2>
    <h5><p><?=$item->cat->name?></p></h5>
    <h3><p><?=$item->anons?></p></h3>
    <?php if($item->audio) : ?>
    <audio controls controlsList="nodownload">
        <source src="/uploads/<?=$item->audio?>">
    </audio>
    <?php endif; ?>
    <?php if($item->cat_id != 22) : ?>
        <p><?=nl2br($item->text)?></p>
        <img src="<?=$pic->img ?>" class="pic"/>
    <?php else: ?>
        <img src="<?=$item->img ?>"/>
    <?php endif; ?>
    <p><a href="<?= \yii\helpers\Url::home();?>"> Радио </a>
</div>
