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

    /* background-color: #1a1a1a;*/

    }

    a {
        color: rgb(19, 238, 25);
    }

    a:hover {
        color: rgb(76, 238, 208);
    }

    a:active {
        color: rgb(76, 238, 208);
        text-decoration: none;
    }

    a:visited {
        color: rgb(53, 238, 44);
        text-decoration: none;
    }

    .grad {
        height: 200px;
        background: linear-gradient(to top, #E4AF9D 20%, #E4E4D8 50%, #A19887 80%);
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

        /*box-shadow: 0 6px 4px -4px rgba(0, 0, 0, .2);*/
        /*box-shadow: 0 6px 4px -4px rgba(189, 217, 233, 0.99);*/

    }
    .text-center{
        padding-top: 10px;
    }

    .latvia{
        background-image: url(<?=\yii\helpers\Url::to('/img/radio_latvia.jpg')?>); /* Путь к фоновому рисунку */
        background-position: top; /* Положение фона */
        background-repeat: no-repeat; /* Повторяем фон по горизонтали */
        background-color: #080808;
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
    .btn:hover {
        color: #fcf8e3;
    }

    .btn:active{
        color: #fcf8e3;
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

    #play_btn{
        position: relative;

    }

    #play{
        position: absolute;
        top: 20%;
        left: 85%;
    }

    .on_button {
        width: 45px;
        height: 45px;
        border-radius: 50px;
        color: #0a0a0a;
    }

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
            height: 170px;
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

        .bard_img {
            padding-top: 0;
        }

        #Container {
            width: 44px;
            height: 44px;
            background-size: 44px 44px;
        }
        #Panel{
            top: 27%;
            left: 11%;
        }
        #Text{
            top: 13px;
            left: 11px;

        }
/*
        @media(min-width:220px) and (max-width:500px){
            .container .content {
                padding-top: 300px;
                text-align: center;
            }
            .latvia{
                width: 100%;
                background-size: 100%;
                height: 170px;
            }
            /*.container .content{
                padding-top: 60%;
                text-align: center;
            }

            .bard_img {
                width: 30%;
            }
            #l3.line {
                height: 80px;
            }
            #l3.line .line_text{
                font-size:15px;;

            }

            .bard_img {
                padding-top: 0;
            }

            #Container {
                width: 44px;
                height: 44px;
                background-size: 44px 44px;
            }
            #Panel{
                top: 27%;
                left: 11%;
            }
            #Text{
                top: 13px;
                left: 11px;

            }
            */

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
                        <div id="play">
                            <input type="button" id="play_btn" value="On" class="on_button"/>
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
                   <audio id="au"  autoplay ></audio>
                   <?php /*<audio id="au">
                        <source src="http://37.192.187.83:10088/bard_mp3" type="audio/mpeg" />
                    </audio>
                    */ ?>
                    <h1 class="text-center" id="gone"></h1>
                </div>


                    <div class="container content">


                        <?= $content ?>


                     

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

            jQuery(document).ready(function() {
                jQuery('#play_btn').on('click',function(){
                    jQuery("#au")[0].play();
                });
                jQuery('#play_btn')[0].click();//initial click on 'play' button to play music which doesn't seem to be working...

            });

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

        function onRadio(link, button_id, replace_button) {
            var au = document.getElementById('au');
            var hide = document.getElementById(button_id);
            var show = document.getElementById(replace_button);
            au.src = 'http://37.192.187.83:10088/'+link;
            au.play();
            au.volume = 0.5;
            hide.style.display = 'none';
            show.style.display = 'block';
            
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
<script>
    /*Выравнивание колонок*/
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
<script type="text/javascript" src="<?=\yii\helpers\Url::to('/js/MooToolsCore.js')?>"></script>
<script type="text/javascript" src="<?=\yii\helpers\Url::to('/js/rheostat.js')?>"></script>
<script type="text/javascript">
    //[CDATA[
    //$.noConflict();
    jQuery(document).ready(function() {


        window.addEvent('domready', function () {
            var rheostat = new Rheostat('Container', 'Indicator', {minValue: 1, maxValue: 100});
            var text = $('Text');
            var panel = $('Panel');
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

