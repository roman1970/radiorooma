<div class="container" style="text-align: center">
    <h2><?=$item->title?></h2>
    <h5><p><?=$item->cat->name?></p></h5>
    <h3><p><?=$item->anons?></p></h3>
    <audio controls>
        <source src="/uploads/<?=$item->audio?>">
    </audio>
    <p><a href="<?= \yii\helpers\Url::home();?>"> Радио </a>
    <p><?=nl2br($item->text)?></p>
</div>
