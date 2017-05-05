<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\BaseHtml;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Pjax;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>


    <?php $this->head() ?>
</head>
<style>
    html,
    body {
        height: 100%;
        color: rgb(248, 248, 255);

        background-image: url(<?=\yii\helpers\Url::to('/img/fons_bg-530x180.jpg')?>);
        scrollbar-face-color:#5997CA;
        scrollbar-shadow-color: #ffffff;
        scrollbar-highlight-color: #ffffff;
        scrollbar-3dlight-color: #5997CA;
        scrollbar-darkshadow-color: #5997CA;
        scrollbar-track-color: #F6F6F6;
        scrollbar-arrow-color: #F6F6F6;
        /* background-color: #1a1a1a;*/

    }
    /*html, body {
        margin: 0px;
        padding:30px 0;
        width:100%;
        height:100%;
        font-family: Arial;
        text-align:center;
    }
    body{
        background:url(webdoc.png);
    }
   .container{
        width:500px;
        margin: 0 auto;
    }
    */
    .wrap > .container {
        padding: 40px 15px 20px;

    }
    .text-center{
        padding-top: 10px;
    }

    .latvia{
        background-image: url(<?=\yii\helpers\Url::to('/img/radio_latvia.jpg')?>); /* Путь к фоновому рисунку */
        background-position: top; /* Положение фона */
        background-repeat: no-repeat; /* Повторяем фон по горизонтали */
        background-color: #2e2e2e;
        background-size: 100%;
        border: 2px solid rgb(158, 178, 177);;
        border-radius: 5px;

    }


    .content{
        padding-top: 40%;

    }
    .btn-success {
        width: 100%;
        overflow: hidden;
    }

    .bard_img{
        vertical-align: middle;
        width: 25%;
        padding-top: 20px;
    }
    input{
        width:500px;
        height:24px;
        font-size:17px;
        margin-top:50px;
        text-align:center;
    }
    /****** Lines *******/
    .line {
        overflow:hidden;
        width:100%;
        border: 2px solid rgb(158, 178, 177);
        border-radius: 5px;
        box-shadow: inset 0 0 6px;

        /*opacity: 0.8; /* Полупрозрачный фон */
        /*box-shadow:0px 5px 5px 3px rgba(0,0,0,0.3);*/
        display:block;
        /*margin-top:10px;
        border-radius:2px;*/
        position:relative;
    }
    .line .line_cover{
        width:100%;
        height:100%;
        position:absolute;
        z-index:2;
        /*background:url(<?php //\yii\helpers\Url::to('/img/talsvtod.png')?>);*/
    }
    .line .line_text{
        width:100%;
        height:100%;
        position:absolute;
        z-index:1;
        padding-top: 7px;
    }
    /****** Line 1 *******/
    #l1.line{
        height: 50px;
        background: #2e2e2e;
        margin-top: 10px;
    }
    #l1.line .line_text{
        font-size: 20px;
        /*font-weight: bold;*/
        /* font-weight: bold; */
        width: 1600px;
        /*width: 900px;*/
        color: rgb(248, 249, 255);
        -webkit-animation: l1_animation 10s linear infinite;
        -moz-animation: l1_animation 10s linear infinite;
    }
    @-webkit-keyframes l1_animation {
        0%{left:100%;}
        100%{left:-100%;}
    }
    @-moz-keyframes l1_animation {
        0%{left:100%;}
        100%{left:-100%;}
    }
    /****** Line 11 *******/
    #l11.line{
        height: 50px;
        background: #2e2e2e;
        margin-top: 10px;
    }
    #l11.line .line_text{
        font-size: 20px;
        /*font-weight: bold;*/
        /* font-weight: bold; */
        width: 1600px;
        /*width: 900px;*/
        color: rgb(248, 249, 255);
        -webkit-animation: l1_animation 8s linear infinite;
        -moz-animation: l1_animation 8s linear infinite;
    }
    /****** Line 12 *******/
    #l12.line{
        height: 50px;
        background: #2e2e2e;
        margin-top: 10px;
    }
    #l12.line .line_text{
        font-size: 20px;
        /*font-weight: bold;*/
        /* font-weight: bold; */
        width: 1600px;
        /*width: 900px;*/
        color: rgb(248, 249, 255);
        -webkit-animation: l1_animation 12s linear infinite;
        -moz-animation: l1_animation 12s linear infinite;
    }



    /****** Line 2 *******/
    #l2.line{
        height:70px;
        background:rgb(90,60,50);
    }
    #l2.line .line_text{
        font-size:60px;;
        position:absolute;
        color:#ffb400;
        font-weight:bold;
        -webkit-animation: l2_animation 5s linear infinite;
        -moz-animation: l2_animation 5s linear infinite;
    }
    @-webkit-keyframes l2_animation {
        0%   { opacity: 0; }
        50% { opacity: 1; }
        100% { opacity: 0; }
    }
    @-moz-keyframes l2_animation {
        0%   { opacity: 0; }
        50% { opacity: 1; }
        100% { opacity: 0; }
    }
    /****** Line 3 *******/
    #l3.line{
        height:70px;
        background:rgb(90,90,90);
        margin-bottom: 10px;
    }
    #l3.line .line_text{
        font-size:20px;;
        position:absolute;
        color: rgb(86, 186, 89);
        padding-top: 0px;
        /*font-weight:bold;*/
        font-family:"Trebuchet MS", Helvetica, sans-serif;
        -webkit-animation: l3_animation 20s linear infinite;
        -moz-animation: l3_animation 20s linear infinite;
    }

    .btn{
        width: 100%;
        color: #1c1c1c;
        overflow: hidden;
        margin-top: 10px;
    }
    .btn:hover{
        color: grey;
    }
    .btn:active{
        color: grey;
    }

    /*регулятор громкости*****/
    #Panel{
        position: absolute;
        top: 30%;
        left: 10%;
    }
    #Container
    {
        position: relative;
        background-image: url(<?=\yii\helpers\Url::to('/img/rheostat.png')?>);
        width: 64px;
        height: 64px;
    }

    #Indicator
    {
        position: absolute;
        background-image: url(<?=\yii\helpers\Url::to('/img/indicator.png')?>);
        width: 4px;
        height: 4px;
        visibility: hidden;
    }
    #Text{
        position: absolute;
        top: 20px;
        left: 22px;
        color: rgb(0, 0, 0);
    }
    }
    /************************/

    @-webkit-keyframes l3_animation {
        0%    {color: rgb(189, 217, 233); }
        20%   {color: rgb(139, 173, 196); }
        40%   {color: rgb(90, 90, 90); }
        60%   {color: rgb(218, 212, 195); }
        80%   {color: rgb(255,255,255); }
        100%  {color: rgb(184, 180, 210); }
    }
    @-moz-keyframes l3_animation {
        0%    {color: rgb(189, 217, 233); }
        20%   {color: rgb(139, 173, 196); }
        40%   {color: rgb(90, 90, 90); }
        60%   {color: rgb(218, 212, 195); }
        80%   {color: rgb(255,255,255); }
        100%  {color: rgb(184, 180, 210); }
    }

    @media (min-width: 1200px) {
        .content {
            padding-top: 35%;
        }
        #Panel{
            position: absolute;
            top: 33%;
            left: 11%;
        }
    }


    @media(min-width:220px) and (max-width:767px){
        .container .content {
            padding-top: 300px;
            text-align: center;
        }
        .latvia{
            width: 100%;
            background-size: 100%;
        }
        /*.container .content{
            padding-top: 60%;
            text-align: center;
        }
        */
        .bard_img {
            width: 30%;
        }
        #l3.line {
            height: 80px;
        }
        #l3.line .line_text{
            font-size:15px;;

        }

    }
</style>

<body>
<?php $this->beginBody() ?>


<div class="wrap">


    <?php /*
    NavBar::begin([
        'brandLabel' => '',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
            ],
        ]);

        NavBar::end();
 */
        ?>
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>



            <audio id="au" autoplay ></audio>

            <?php //echo phpinfo();//<div id="rand"></div> ?>
            <div class="row row-offcanvas row-offcanvas-right ">

                <div class="navbar-fixed-top container">

                    <div class="line" id="l1">
                        <div class="line_text" id="rand">РАДИО 'КОМНАТА С МЕХОМ'</div>
                        <div class="line_cover"></div>
                    </div>

                    <div class="latvia">


                        <p class="text-center" ><img src='<?=\yii\helpers\Url::to('/img/barded2.png')?>' width="200px" id="player" class="bard_img"></p>
                        <div id="Panel">
                            <div id="Container">
                                <span id="Text">Vol</span>
                                <div id="Indicator" style="left: 57px; top: 28px; visibility: visible; zoom: 1; opacity: 1;">

                                </div>
                            </div>
                        </div>
                        <p class="text-center">



                        </p>



                    </div>


                    <?php /*
                    <button type="button" class="btn" onclick="onRadio('test_mp3')" title="Первый канал">
                        Канал ФИЗИКА ДЛЯ НАСТОЯЩИХ ПАНКОВ! Осторожно! Ненормативная лексика!
                    </button>
                    <div class="line" id="l11">
                        <div class="line_text" id="rand">РАДИО 'ОТ ШУБЕРТА ДО ШНУРОВА'</div>
                        <div class="line_cover"></div>
                    </div>
                    <button type="button" class="btn" onclick="onRadio('second_mp3')" title="Второй канал">
                        Канал САМАЯ РАЗНАЯ МУЗЫКА
                    </button>
                    <div class="line" id="l12">
                        <div class="line_text" id="rand1">РАДИО 'ОТ ШУБЕРТА ДО ШНУРОВА'</div>
                        <div class="line_cover"></div>
                    </div>

                    <button type="button" class="btn" onclick="onRadio('bard_mp3')" title="Третий канал">
                        Канал КОМНАТА С МЕХОМ Ведущий: Бард, который перевернул ЗИЛ"
                    </button>
                    <div class="line" id="l1">
                        <div class="line_text" id="rand2">РАДИО 'ОТ ШУБЕРТА ДО ШНУРОВА'</div>
                        <div class="line_cover"></div>
                    </div>
                    */?>

                    <div class="line" id="l3">
                        <div class="line_text">
                            <p class="text-center">
                                Ведущий "Бард, который перевернул ЗИЛ" Роман Беляшов
                            </p>

                       </div>

                        <div class="line_cover"></div>
                    </div>
                    <h1 class="text-center" id="gone"></h1>
                </div>


                    <div class="container content">


                        <?= $content ?>


                        <script>

                            var pl = 1;

                            setInterval(function () {
                               // getBlockForMeta('gggg', 'test_mp3', 'rand');
                                //getBlockForMeta('gggg', 'second_mp3', 'rand1');
                                getBlockForMeta('gggg', 'bard_mp3', 'rand');

                            }, 15000);

                            function getBlockForMeta(trackId, mounting_point, blockId) {
                                var rand = document.getElementById(trackId);
                                if(rand) rand.remove();

                                var script = document.createElement('script');

                                script.src = '/site/get-item-by-link/?u=' + mounting_point + '&b=' + blockId;
                                script.type = 'text/javascript';
                                script.id = trackId;

                                document.body.appendChild(script);
                            }

                            /*setInterval(function () {

                                var rand = document.getElementById('pppp');
                                if(rand) rand.remove();
                               
                                var script = document.createElement('script');

                                script.src = "<?=\yii\helpers\Url::to('/site/get-item-text/');?>";
                                script.type = 'text/javascript';
                                script.id = 'pppp';


                                document.body.appendChild(script);

                            }, 60000);
                            */

                        </script>

                    </div>
                    



            </div>

        </div>

    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; "Комната с мехом" <?= date('Y') ?></p>
            <a href="http://37.192.187.83:10088/test_mp3">Поток</a>
            

        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>


    <?php $this->endPage() ?>

    <script>
        $(document).ready(function() {
            
            height = 200;

            var au = document.getElementById('au');
            au.src = 'http://37.192.187.83:10088/bard_mp3';
            au.volume = 0.1;

            /*var player = document.getElementById('l3');


            if (player.addEventListener) {
                if ('onwheel' in document) {
                    // IE9+, FF17+, Ch31+
                    player.addEventListener("wheel", onWheel);
                } else if ('onmousewheel' in document) {
                    // устаревший вариант события
                    player.addEventListener("mousewheel", onWheel);
                } else {
                    // Firefox < 17
                    player.addEventListener("MozMousePixelScroll", onWheel);
                }
            } else { // IE8-
                player.attachEvent("onmousewheel", onWheel);
            }
            */


            au.onerror = function () {
                var gone = document.getElementById('gone');
                gone.innerHTML = 'Извините, пошёл спать!';
            };





                jQuery(".accord h6:first").addClass("active");

                jQuery(".accord div").hide();

                jQuery(".accord h6").click(function() {

                    jQuery(this).next("div").slideToggle("slow").siblings("div:visible").slideUp("slow");


                    jQuery(this).toggleClass("active");

                    jQuery(this).siblings("h6").removeClass("active");
                });




        });



        function onWheel(e) {
            e = e || window.event;

            // wheelDelta не дает возможность узнать количество пикселей
            var delta = e.deltaY || e.detail || e.wheelDelta;

            var vol = delta/1000;

            var audio = document.getElementById('au');
            var player = document.getElementById('l3');

            if(vol < 0.05) {
                audio.volume = 0;
            }
            else if(vol > 0.9) {
                audio.volume = 1;
            }
            else  audio.volume = (+audio.volume + vol) > 1 ? 1 : +audio.volume + vol;

            //player.innerHTML = +player.innerHTML + vol;



            e.preventDefault ? e.preventDefault() : (e.returnValue = false);
        }

        function onAudio(link) {
            var au = document.getElementById('au');
            au.src = 'http://37.192.187.83:10080/'+link;
            au.volume = 0.5;

            var off_button = document.getElementById('off_button');
            var on_button = document.getElementById('on_button');
            on_button.style.display = 'none';
            off_button.style.display = 'block';

        }

        function offAudio() {
            var au = document.getElementById('au');
            au.src = 'http://37.192.187.83:10088/bard_mp3';
            au.volume = 0.5;
            var off_button = document.getElementById('off_button');
            var on_button = document.getElementById('on_button');
            on_button.style.display = 'block';
            off_button.style.display = 'none';
        }

        function onRadio(link) {
            var au = document.getElementById('au');
            au.src = 'http://37.192.187.83:10088/'+link;
            au.play();
            au.volume = 0.5;
        }
        
        function home() {
            window.location.reload();
        }
        
        function like(id) {
            jQuery.ajax({
                type: "GET",
                url: 'http://37.192.187.83:10033/rockncontroll/default/add-radio-like/',
                data: "id="+id,
                success: function(html){
                    jQuery("#summary").html(html);

                }

            });
            
        }

        function getTrackN(id) {
            jQuery.ajax({
                type: "GET",
                url: 'http://37.192.187.83:10033/rockncontroll/default/add-radio-like/',
                data: "id="+id,
                success: function(html){
                    $("#summary").html(html);

                }

            });

        }



       
        /*

        var name = $("#comm_name");
        var body = $("#comm_body");
        var content_id = $("#comm_cont");
        var name_string = '';
        var n = '';


        var date = new Date();
        $.cookie.raw = true;


        $("#send").click(
            function() {
                if($.cookie('name')) name_string = $.cookie('name');
                else name_string = name.val();

                addComment(name_string, body.val());
                sleep(2000);

                $("#comments").load("/krokodile/default/callcomm/");
                $('#w0').trigger( 'reset' ); //очищаем форму
                $.cookie('name', name_string, { expires: 7 });

                //setCookie('name', name_string, { expires: 7 });

            });

    });
    function addComment(name, body, content) {

        //Валидация
        if (name === "") {
            alert("Введите Имя или перезагрузите страницу");
            return false;
        }

        if (body === "") {
            alert("Введите Текст");
            return false;
        }


        $.ajax({
            type: "GET",
            url: "/krokodile/default/addcomment/",
            data: "name="+name+"&body="+body+"&content_id="+content,
            success: function(html){
                $("#base").html(html);
            }

        });

    }
    /*Симуляция сна
    function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds){
                break;
            }
        }
    }

    //Вытягиваем случайный айтем
    setInterval(function () {

        var script = document.createElement('script');

        script.src = 'http://football-match.xyz/krokodile/default/rand-item/';
        script.type = 'text/javascript';

        document.body.appendChild(script);

    }, 20000);
*/

</script>
<script type="text/javascript" src="<?=\yii\helpers\Url::to('/js/MooToolsCore.js')?>"></script>
<script type="text/javascript" src="<?=\yii\helpers\Url::to('/js/rheostat.js')?>"></script>
<script type="text/javascript">
    //[CDATA[
    //$.noConflict();
    jQuery(document).ready(function() {

       

        window.addEvent('domready', function () {
            var rheostat = new Rheostat('Container', 'Indicator', {minValue: 1, maxValue: 100});
            var text = $('Text');
            var audio = document.getElementById('au');
            var volume = 72;

            rheostat.addEvent('valueChanged', function (value) {
                //alert(value);
                volume = value / 100;
                audio.volume = volume;
                text.innerHTML = value + '%';
                // var size = value + 'pt';
                // text.set('text', size);
                // text.setStyle('font-size', size);
            })
        });
    });
    //]]
</script>

