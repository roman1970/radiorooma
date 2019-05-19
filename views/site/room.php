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
    h2 img {
        vertical-align: bottom;
    }
    .cat{
        color: white;
    }
    .anons{
        color: rgb(159, 173, 178);
    }
    .title{
        color: rgb(244, 134, 104);
    }
    a {
        color: rgb(117, 147, 180);
        text-decoration: none;
    }
</style>
<div class="container" style="text-align: center">
    <img src='<?=\yii\helpers\Url::to('/img/barded2.png')?>' width="70px" id="player" class="bard_img">
    <h2>
        <span class="title"><?=$item->title?></span>
    </h2>
    <h5><p class="cat"><?=$item->cat->name?></p></h5>
    <h3><p class="anons"><?=$item->anons?></p></h3>
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
