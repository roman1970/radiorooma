<?php
/**
 * @var \app\models\RadioItem $item
 * @var \app\models\RadioItem $pic
 * @var \app\models\RadioItem $kvn
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
    button p {
        height: 80px;
    }
    #hidden_audio, #radio_player{
        display: none;
    }

    .btn-success {
        background-color: rgb(53, 68, 82);
        border-color: rgb(100, 107, 124);
        background: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgb(100, 107, 124)), to(rgb(0, 0, 20)));
    }
    #text{
        max-height: 0px;
        overflow: hidden;
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
    <audio controls controlsList="nodownload" id="song_player">
        <source src="/uploads/<?=$item->audio?>">
    </audio>
        <audio controls controlsList="nodownload" id="radio_player">
            <source src="http://37.192.187.83:10088/test_mp3">
        </audio>
    <?php endif; ?>
    <?php if($item->cat_id != 22) : ?>
        <div id="text"><?=nl2br($item->text)?></div>
        <a class="content_toggle" href="#">Текст</a><br>

        <img src="<?=$pic->img ?>" class="pic"/>
    <?php else: ?>
        <p>Из коллекции Романа Беляшова</p>
        <img src="<?=$item->img ?>" class="pic"/>
        <h5><p class="cat"><?=$kvn->cat->name?></p></h5>
        <h6 class="anons"><?=$kvn->anons?></h6>
        <audio controls controlsList="nodownload" autoplay id="hidden_audio">
            <source src="/uploads/<?=$kvn->audio?>">
        </audio>
        <p id="text2"><?=nl2br($kvn->text)?></p>

    <?php endif; ?>
    <h3>
        <a href="http://radiorooma.ru"><i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i>
            Сейчас на Радио<i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i>
        </a>
    </h3>
    <button type="submit" class="btn-success" onclick="onRadiorooma()" id="radiorooma" style="height: 95px;">
        <p style="font-size: 35px;">Комната с Мехом</p>
    </button>
    <button type="submit" class="btn-success" onclick="stopRadiorooma()" id="stop-radiorooma" style="height: 95px;">
        <p style="font-size: 35px;">Вырубить</p>
    </button>

    <hr style="border: 2px solid rgb(244, 134, 104);">
</div>
<script>

    var hidden_audio = document.getElementById('hidden_audio');
    var song_player = document.getElementById('song_player');
    var au = document.getElementById('radio_player');
    //au.src = 'http://88.212.253.193:8000/test';
    au.src = 'http://37.192.187.83:10088/test_mp3';


    $(window).scroll(function () {
        hidden_audio.play();
    });
    $(window).bind('touchmove', function(e) {
        hidden_audio.play();
    });
    $(window).bind('touchend', function(e) {
        hidden_audio.play();
    });
    $(window).bind('mouseup', function(e) {
        hidden_audio.play();
    });
    $('body').on({
        'touchmove': function(e) {
            hidden_audio.play();
        }
    });

    setTimeout(function run() {
        $.ajax({
            type: "GET",
            url: "http://37.192.187.83:10033/rockncontroll/datas/show-current-radio-tracks-test/",
            success: function(html){
                $("#radiorooma").html(html);
            }

        });

        //showTxt(canal);

        setTimeout(run, 10000);

    }, 10000);

    function stopRadiorooma() {
        var au = document.getElementById('radio_player');
        //au.src = 'http://88.212.253.193:8000/test';
        au.src = 'http://37.192.187.83:10088/test_mp3';
        au.pause();
        au.currentTime = 0;
        $('#song_player').show();
        $('#stop-radiorooma').hide();
    }

    function onRadiorooma(){
        var song_player = document.getElementById('song_player');
        var au = document.getElementById('radio_player');
        //au.src = 'http://88.212.253.193:8000/test';
        au.src = 'http://37.192.187.83:10088/test_mp3';
        //song_player.stop();
        $('#song_player').hide();
        $('#stop-radiorooma').show();
        au.play();
        //window.location.href = 'http://radiorooma.ru';
    }

    $(".content_toggle").click(function(){
        $('#text').slideDown(300, function(){
            $(this).css({"display":"block", "max-height":"none"});
            $('.content_toggle').hide();
        });

        return false;
    });

    au.onerror = function () {
        au.src = 'http://88.212.253.193:8000/test';
        setTimeout(function run() {

            jQuery.ajax({
                type: "GET",
                url: '<?=\yii\helpers\Url::to(['/site/show-current-radio-tracks-test/']) ?>',
                success: function(html){
                    jQuery("#radio_test").html(html);
                }

            });

            setTimeout(run, 10000);

        }, 10000);

        /*
        var gone = document.getElementById('gone');
        gone.innerHTML = 'Извините, пошёл спать!';
        */
    };

</script>
