<?php
/**
 * @var \app\models\RadioItem $item
 * @var \app\models\RadioItem $pic
 * @var \app\models\RadioItem $kvn
 */
?>

<style>

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
        /*height: 80%;*/
        border-radius: 25px;
        /*
        max-height: 80%;
        max-width: 100%;*/
        background-color: rgba(84, 84, 84, 0.2);
        opacity: 0.7;
        /**/

    }
    .css-adaptive {
        max-width: 100%;
        /*height: 300px;*/
        padding: 10px;
    }
    p{
        font-size: 16px;
    }
    button p {
        height: 80px;
    }
    button{
        width: auto;
    }
    #hidden_audio, #radio_player{
        display: none;
    }
    .btn-default {
        color: rgb(255, 152, 0);
        background-color: rgb(120, 61, 23);
        border-color: rgb(204, 204, 204);
        width: 30px;
    }
    .width-wide{
        width: 100%;
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
    <img src='<?=\yii\helpers\Url::to('/img/barded3.png')?>' width="70px" id="player" class="bard_img">
    <p style="font-size: 12px">Из коллекции Романа Беляшова</p>
    <h5><p class="cat"><?=$item->cat->name?></p></h5>
    <h6 class="anons"><?=$item->anons?></h6>
    <audio controls controlsList="nodownload" id="radio_player">
        <source src="http://37.192.187.83:10088/test_mp3">
    </audio>
    <?php if($item->audio) : ?>
    <audio controls controlsList="nodownload" id="song_player">
        <source src="/uploads/<?=$item->audio?>">
    </audio>
    <?php endif; ?>
    <?php if($item->cat_id != 22) : ?>
        <div id="text"><?=nl2br($item->text)?></div>
        <a class="content_toggle" href="#">Текст</a><br>

        <img src="<?=$pic->img ?>" class="pic css-adaptive"/>
    <?php else: ?>

        <img src="<?=$item->img ?>" class="pic css-adaptive" id="from_pics" onclick="playPrase()"/>
        <h5><p class="cat"><?=$kvn->cat->name?></p></h5>
        <h6 class="anons"><?=$kvn->anons?></h6>
        <audio controls controlsList="nodownload" autoplay id="hidden_audio">
            <source src="/uploads/<?=$kvn->audio?>">
        </audio>
        <p id="text2"><?=nl2br($kvn->text)?></p>

    <?php endif; ?>
    <h3>
        <i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i>
            Сейчас на Радио<i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i>
    </h3>
    <button type="submit" class="btn-success width-wide" onclick="onRadiorooma()" id="radiorooma" style="height: 95px;">
        <p style="font-size: 35px;">Комната с Мехом</p>
    </button>
    <button type="submit" class="btn-success glyphicon glyphicon-pause width-wide" onclick="stopRadiorooma()" id="stop-radiorooma" style="height: 45px;display: none">
        <p style="font-size: 35px;"></p>
    </button>

<?php /*
    <div class="container">
        <span class="title">Словарь БКПЗ</span>
        <div class="btn-toolbar">
            <div class="btn-group btn-group-sm">
                <button class="btn btn-default" onclick="onLetter('A')">A</button>
                <button class="btn btn-default">B</button>
                <button class="btn btn-default">C</button>
                <button class="btn btn-default">D</button>
                <button class="btn btn-default">E</button>
                <button class="btn btn-default">F</button>
                <button class="btn btn-default">G</button>
                <button class="btn btn-default">H</button>
                <button class="btn btn-default">I</button>
                <button class="btn btn-default">J</button>
                <button class="btn btn-default">K</button>
                <button class="btn btn-default">L</button>
                <button class="btn btn-default">M</button>
                <button class="btn btn-default">N</button>
                <button class="btn btn-default">O</button>
                <button class="btn btn-default">P</button>
                <button class="btn btn-default">Q</button>
                <button class="btn btn-default">R</button>
                <button class="btn btn-default">S</button>
                <button class="btn btn-default">T</button>
                <button class="btn btn-default">U</button>
                <button class="btn btn-default">V</button>
                <button class="btn btn-default">W</button>
                <button class="btn btn-default">X</button>
                <button class="btn btn-default">Y</button>
                <button class="btn btn-default">Z</button>
                <button class="btn btn-default">А</button>
                <button class="btn btn-default">Б</button>
                <button class="btn btn-default">В</button>
                <button class="btn btn-default">Г</button>
                <button class="btn btn-default">Д</button>
                <button class="btn btn-default">Е</button>
                <button class="btn btn-default">Ж</button>
                <button class="btn btn-default">З</button>
                <button class="btn btn-default">И</button>
                <button class="btn btn-default">К</button>
                <button class="btn btn-default">Л</button>
                <button class="btn btn-default">М</button>
                <button class="btn btn-default">Н</button>
                <button class="btn btn-default">О</button>
                <button class="btn btn-default">П</button>
                <button class="btn btn-default">Р</button>
                <button class="btn btn-default">С</button>
                <button class="btn btn-default">Т</button>
                <button class="btn btn-default">У</button>
                <button class="btn btn-default">Ф</button>
                <button class="btn btn-default">Х</button>
                <button class="btn btn-default">Ч</button>
                <button class="btn btn-default">Ц</button>
                <button class="btn btn-default">Ш</button>
                <button class="btn btn-default">Щ</button>
                <button class="btn btn-default">Ы</button>
                <button class="btn btn-default">Э</button>
                <button class="btn btn-default">Ю</button>
                <button class="btn btn-default">Я</button>
            </div>
        </div>
    </div>
 */?>
    <hr style="border: 2px solid rgb(244, 134, 104);">
</div>

<script>

    //var hidden_audio = document.getElementById('hidden_audio');
    //var song_player = document.getElementById('song_player');
    //var au = document.getElementById('radio_player');
    //au.src = 'http://88.212.253.193:8000/test';
    //if(au)au.src = 'http://37.192.187.83:10088/test_mp3';


    /*
    $(window).scroll(function () {
        if(hidden_audio) hidden_audio.play();
    });
    $(window).bind('touchmove', function(e) {
        if(hidden_audio) hidden_audio.play();
    });
    $(window).bind('touchend', function(e) {
        if(hidden_audio) hidden_audio.play();
    });
    $(window).bind('mouseup', function(e) {
        if(hidden_audio) hidden_audio.play();
    });
    $('body').on({
        'touchmove': function(e) {
            if(hidden_audio) hidden_audio.play();
        }
    });
    */


    function playPrase()
    {
        var hidden_audio = document.getElementById('hidden_audio');
        if(hidden_audio) hidden_audio.play();
    }

    setTimeout(function run() {
        $.ajax({
            type: "GET",
            //url: "http://37.192.187.83:10033/rockncontroll/datas/show-current-radio-tracks-test/",
            url: "<?=\yii\helpers\Url::to(['/site/show-current-radio-tracks-test/']) ?>",
            success: function(html){
                $("#radiorooma").html(html);
            }

        });

        //showTxt(canal);

        setTimeout(run, 10000);

    }, 10000);

    function stopRadiorooma() {
        var au = document.getElementById('radio_player');
        au.src = 'http://88.212.253.193:8000/test';
        //au.src = 'http://37.192.187.83:10088/test_mp3';
        au.pause();
        au.currentTime = 0;
        $('#song_player').show();
        $('#stop-radiorooma').hide();
        if(hidden_audio) hidden_audio.play();
    }

    function onRadiorooma(){
        var song_player = document.getElementById('song_player');
        var au = document.getElementById('radio_player');
        if(au)au.src = 'http://88.212.253.193:8000/test';
        //if(au)au.src = 'http://37.192.187.83:10088/test_mp3';
        if(song_player)song_player.pause();
        if(song_player)song_player.currentTime = 0;
        $('#song_player').hide();
        $('#stop-radiorooma').show();
        var hidden_audio = document.getElementById('hidden_audio');
        if(hidden_audio) {
            hidden_audio.pause();
            hidden_audio.currentTime = 0;
        }
        au.play();
        //window.location.href = 'http://radiorooma.ru';
    }

    function onLetter(letter){
        alert(letter);
    }

    $(".content_toggle").click(function(){
        $('#text').slideDown(300, function(){
            $(this).css({"display":"block", "max-height":"none"});
            $('.content_toggle').hide();
        });

        return false;
    });

    if(au)au.onerror = function () {
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
