<?php
/**
 * @var \app\models\RadioItem $item
 */
?>
<style>
    img{
        width: 80%;
    }
</style>
<div id="page">

    <p id="on_button">
        <button type="button" class="btn btn-success"  >
            <?=\yii\bootstrap\Html::a(
                'Возьми',
                '/'.$item->alias.'.html',
                ['cursor' => 'pointer', 'target' => '_blank', 'id' => 'takee'])
            ?>
        </button>
    </p>

    <p style="display: none" id="off_button"><button type="button" class="btn btn-success" onclick="offAudio()" >Переключиться на радио</button></p>
    <?php /*<p id="like_button"><button type="button" class="btn btn-success" onclick="like('<?=$item->id?>')" >Понравилось</button></p>
    <p><audio controls src="http://37.192.187.83:10080/<?=$item->audio"></audio></p>
    <p id="summary">Понравилось: <?=$item->likes?></p>*/?>
    <?php if($item->cat_id != 22) : ?>
        <h3><?=$item->title?></h3>
        <p>(<?= $item->source->title ?> - <?= $item->source->author->name ?>)</p>
        <p class="txt"><?php echo nl2br($item->text)?></p>
    <?php endif; ?>
    <?php if($item->img) : ?>
        <img src="<?=$item->img ?>" id="img" class="pic"/>
    <?php endif; ?>
    <br>
    <?=\yii\bootstrap\Html::a(
        'Поделиться',
        '/'.$item->alias.'.html', ['cursor' => 'pointer', 'target' => '_blank']) ?>

</div>
<script>
    jQuery(document).ready(function() {
        var page = document.getElementById('page');
        var img = document.getElementById('img');
        //console.log(height);
        if(img === null)
            height = page.clientHeight;
        else
            height = page.clientHeight + 200;
        var acc = document.getElementById('acc');
        var cats = document.getElementById('cats');
        //console.log(acc);
        var new_height = height + 25;
        acc.style.height = new_height+"px";
        cats.style.height = new_height+"px";
        console.log(acc.style.height);
    });
</script>




