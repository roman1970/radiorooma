<?php
/**
 * @var \app\models\RadioItem $item
 * @var string $resp
 */
?>

<div class="container" style="text-align: center">
    <hr style="border: 2px solid rgb(244, 134, 104);">
    <h1><?=$resp ?></h1>
    <h2>
        <span class="title"><?=$item->title?></span>
    </h2>

    <h6 class="text"><?=$item->text?></h6>
    <?php if($item->img) : ?>
        <img src="<?=$item->img ?>" class="pic"/>
    <?php endif; ?>
    <h6 class="anons"><?=$item->anons?></h6>
    <?php if($item->audio) : ?>
        <audio controls controlsList="nodownload" >
            <source src="/uploads/<?=$item->audio?>">
        </audio>
    <?php endif; ?>

    <hr style="border: 2px solid rgb(244, 134, 104);">
</div>
