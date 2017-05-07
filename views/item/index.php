<style>
    h3,p{
        text-align: center;
    }
    .btn-success:hover {
        color: rgb(255, 255, 255);
        background-color: rgb(46, 46, 46);
        border-color: rgb(73, 73, 74);
    }
    .btn-success {
        color: rgb(255, 255, 255);
        background-color: rgb(57, 60, 57);
        border-color: rgb(27, 31, 27);
    }
</style>
<?php \yii\widgets\Pjax::begin(['id' => 'section_page']); ?>
<div id="page">
    <h3><?=$item->title?></h3>
    <p>(<?= $item->source->title ?> - <?= $item->source->author->name ?>)</p>
    <?php /*
    <form action="<?=Yii::$app->homeUrl?>">
        <button type="submit" class="btn btn-success">На главную</button>
    </form>
 */ ?>

    <p id="on_button"><button type="button" class="btn btn-success" onclick="onAudio('<?=$item->audio?>')" >Воспроизвести</button></p>
    <p style="display: none" id="off_button"><button type="button" class="btn btn-success" onclick="offAudio()" >Переключиться на радио</button></p>
    <p id="like_button"><button type="button" class="btn btn-success" onclick="like('<?=$item->id?>')" >Понравилось</button></p>
    <?php //<p><audio controls src="http://37.192.187.83:10080/<?=$item->audio"></audio></p> ?>
    <p id="summary">Понравилось: <?=$item->likes?></p>
    <p class="txt"><?php echo nl2br($item->text)?></p>
</div>
<script>
    jQuery(document).ready(function() {
        var page = document.getElementById('page');
        //console.log(height);
        height = page.clientHeight;
        var acc = document.getElementById('acc');
        //console.log(acc);
        var new_height = height + 25;
        acc.style.height = new_height+"px";
        //console.log(acc.style.height);
    });
</script>
<?php \yii\widgets\Pjax::end(); ?>



