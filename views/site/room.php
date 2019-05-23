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
    h2{
        margin: 0;
    }
    h2 img {
        vertical-align: bottom;
    }
    .cat{
        color: white;
    }
    .anons{
        color: rgb(159, 173, 178);
        font-size: 20px;
    }
    .title{
        color: rgb(244, 134, 104);
    }
    a {
        color: rgb(244, 134, 104);
        text-decoration: none;
    }
    .pic{
        border-radius: 25px;
    }
    p{
        font-size: 16px;
    }
    .btn-success {
        background-color: rgb(53, 68, 82);
        border-color: rgb(100, 107, 124);
        background: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgb(100, 107, 124)), to(rgb(0, 0, 20)));
    }
</style>
<audio id="bard" ></audio>
<div class="container" style="text-align: center">
    <hr style="border: 2px solid rgb(244, 134, 104);">
    <h2>
        <span class="title"><?=$item->title?></span>
    </h2>
    <img src='<?=\yii\helpers\Url::to('/img/barded2.png')?>' width="70px" id="player" class="bard_img">

    <h5><p class="cat"><?=$item->cat->name?></p></h5>
    <h6 class="anons"><?=$item->anons?></h6>
    <?php if($item->audio) : ?>
    <audio controls controlsList="nodownload">
        <source src="/uploads/<?=$item->audio?>">
    </audio>
    <?php endif; ?>
    <?php if($item->cat_id != 22) : ?>
        <p><?=nl2br($item->text)?></p>
        <img src="<?=$pic->img ?>" class="pic"/>
    <?php else: ?>
        <img src="<?=$item->img ?>" class="pic"/>
    <?php endif; ?>
    <h3>
        <a href="http://radiorooma.ru"><i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i>
            Сейчас на Радио<i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i>
        </a>
    </h3>
    <button type="submit" class="btn-success" onclick="onRadiorooma()" id="radiorooma" style="height: 95px;">
        <p style="font-size: 35px;">Комната с Мехом</p>
    </button>

    <hr style="border: 2px solid rgb(244, 134, 104);">
</div>
<script>
    var player_bard = document.getElementById('au_bard');
    setTimeout(function run() {
        $.ajax({
            type: "GET",
            url: "http://radiorooma.ru/site/show-current-radio-tracks-test/",
            success: function(html){
                $("#radiorooma").html(html);
            }

        });

        //showTxt(canal);

        setTimeout(run, 10000);

    }, 10000);

    function onRadiorooma(){
        window.location.href = 'http://radiorooma.ru';
    }

</script>
