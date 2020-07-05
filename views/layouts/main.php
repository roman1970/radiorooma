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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-80881607-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-80881607-1');
        gtag('config', 'AW-789523727');
    </script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-9346242100753678",
            enable_page_level_ads: true
        });
    </script>

    <!-- Event snippet for включение трансляции conversion page
    In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
    <script>
        function gtag_report_conversion(url) {
            var callback = function () {
                if (typeof(url) != 'undefined') {
                    window.location = url;
                }
            };
            gtag('event', 'conversion', {
                'send_to': 'AW-789523727/f6Z2CM6TvIkBEI_avPgC',
                'event_callback': callback
            });
            return false;
        }
    </script>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="twitter:image:src" content="<?=\yii\helpers\Url::to('/img/barded3_small.png')?>">
    <meta name="twitter:site" content="К○Мнɑ⊥а&copy;МеχØΣ">
    <meta name="twitter:card" content="К○Мнɑ⊥а&copy;МеχØΣ">
    <meta name="twitter:title" content="Горький юмор и Весёлая философия">
    <meta name="twitter:description" content="<?=\yii\helpers\Url::to(['/site/show-current-radio-tracks-test/']) ?>">

    <meta property="og:image" content="<?=\yii\helpers\Url::to('/img/barded3_small.png')?>">

    <meta property="og:site_name" content="К○Мнɑ⊥а&copy;МеχØΣ">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Горький юмор и Весёлая философия">
    <meta property="og:url" content="http://radiorooma.noravbo.ru">
    <meta property="og:description" content="<?=\yii\helpers\Url::to(['/site/show-current-radio-tracks-test/']) ?>">

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

    #takee {
        color: white;
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
        padding-top: 0px;
    }

    .latvia{
        background-image: url(<?=\yii\helpers\Url::to('/img/radio_latvia.jpg')?>);

        background-position: top; /* Положение фона */
        background-repeat: no-repeat; /* Повторяем фон по горизонтали */
        background-color: #080808;
        background-size: 100%;
        border: 2px solid rgb(158, 178, 177);;
        border-radius: 5px;
    }

    .content{
        padding-top: 45%;

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


    #page::-webkit-scrollbar{ width: 10px; /* 1 - вертикальный скроллбар */}
    #page::-webkit-scrollbar:horizontal{ height: 22px; /* 1 - горизонтальный скроллбар */}
    #page::-webkit-scrollbar-button {background: #008000; /* 2 - кнопка */}
    #page::-webkit-scrollbar-track {background: #008000;/* 3 - трек */}
    #page::-webkit-scrollbar-track-piece { background: rgb(73, 148, 75); /* 4 – видимая часть трека */ }
    #page::-webkit-scrollbar-thumb {background: #35ee2c; border-radius: 10px; -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); /* 5 - ползунок */}

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
        /*z-index:2;*/
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
        height: 38px;
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
        height:105px;
        background:rgb(90,90,90);
        margin-bottom: 10px;
    }
    #l3.line .line_text{
        font-size:15px;
        position:absolute;
        color: rgb(86, 186, 89);
        padding-top: 0px;
        /*font-weight:bold;*/
        font-family:"Trebuchet MS", Helvetica, sans-serif;
        -webkit-animation: l3_animation 20s linear infinite;
        -moz-animation: l3_animation 20s linear infinite;
    }

    .active-button {
        background-color: rgb(255, 131, 96);
        /*background-color: rgb(86, 186, 89);*/
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
        top: 125px;
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
    #Panel2{
        position: absolute;
        top: 125px;
        left: 85%;
    }
    #Container2
    {
        position: relative;
        background-image: url(<?=\yii\helpers\Url::to('/img/rheostat.png')?>);
        width: 64px;
        height: 64px;

    }

    #Indicator2
    {
        position: absolute;
        background-image: url(<?=\yii\helpers\Url::to('/img/indicator.png')?>);
        width: 4px;
        height: 4px;
        visibility: hidden;
    }
    #Text2{
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

        display: none;
    }

    .on_button {
        width: 10%;
       /* height: 35px;*/
        border-radius: 7px;
        color: #0a0a0a;
        margin: 0;
    }

    #buttons{
        /*display: none;*/
        margin-left: 27%;
    }

    #img{
        text-align: center;
        height: 380px;
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
            padding-top: 38%;
        }
        #Panel{
            position: absolute;
            top: 125px;
            left: 11%;
        }
        #Panel2{
            position: absolute;
            top: 125px;
            left: 85%;
        }
    }

    @media(min-width:700px) and (max-width:800px) {

        #Panel {
            top: 81px;
            left: 10%;
        }

        #Text {
            top: 20px;
            left: 18px;

        }
        #Panel2 {
            top: 81px;
            left: 82%;
        }

        #Text2 {
            top: 20px;
            left: 18px;

        }
    }


    @media(min-width:400px) and (max-width:700px) {
        .container .content {
            padding-top: 50%;
            text-align: center;
        }

        .latvia {
            width: 100%;
            background-size: 100%;
            /*height: 170px;*/
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
             height: 43px;
         }
         #l3.line .line_text{
             font-size:13px;

         }

        .bard_img {
            padding-top: 0;
        }

        #Container {
            width: 44px;
            height: 44px;
            background-size: 44px 44px;
            top: 22px;
        }



        #Text {
            top: 13px;
            left: 11px;

        }
        #Container2 {
            width: 44px;
            height: 44px;
            background-size: 44px 44px;
            top: 22px;
        }



        #Text2 {
            top: 13px;
            left: 11px;

        }

    }

    /*adaptive Panel*/

    @media(min-width:400px) and (max-width:500px) {
        .container .content {
            padding-top: 55%;
        }
        #Panel {
            top: 50px;
            left: 10%;
        }
        #Panel2 {
            top: 50px;
            left: 80%;
        }
    }

    @media(min-width:500px) and (max-width:600px) {
        .container .content {
            padding-top: 55%;
        }
        #Panel {
            top: 55px;
            left: 10%;
        }
        #Panel2 {
            top: 55px;
            left: 82%;
        }
    }

    @media(min-width:600px) and (max-width:700px) {
        .container .content {
            padding-top: 55%;
        }
        #Panel {
            top: 65px;
            left: 12%;
        }
        #Panel2 {
            top: 65px;
            left: 84%;
        }
    }

    @media(min-width:800px) and (max-width:900px) {
        .container .content {
            padding-top: 55%;
        }
        #Panel {
            top: 85px;
            left: 10%;
        }
        #Panel2 {
            top: 85px;
            left: 82%;
        }
    }

    @media(min-width:900px) and (max-width:978px) {
        .container .content {
            padding-top: 55%;
        }
        #Panel {
            top: 85px;
            left: 10%;
        }
        #Panel2 {
            top: 85px;
            left: 82%;
        }
    }

    @media(min-width:978px) and (max-width:1200px) {
        .container .content {
            padding-top: 55%;
        }
        #Panel {
            top: 105px;
            left: 11%;
        }
        #Panel2 {
            top: 105px;
            left: 84%;
        }
    }


    @media(min-width:150px) and (max-width:500px) {
        .container .content {
            padding-top: 62%;
        }

        .on_button {
            width: 14.5%;
        }
        #buttons{
            display: block;
            margin-left: 7%;
        }
        #l1.line .line_text {
            font-size: 15px;
        }
        p {
            margin: 0 0 0px;
        }
        h4 {
            font-size: 13px;
        }


    }



    @media(min-width:150px) and (max-width:400px){

        #play{
            display: block;
        }

        #buttons{
            display: block;
        }

        #cats, #acc {
            display: none;
        }
        h4 {
            font-size: 13px;
        }

        .container .content {
            padding-top: 50%;
            text-align: center;
        }

        .latvia {
            width: 100%;
            background-size: 100%;
            /*height: 170px;*/
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
            height: 43px;
        }
        #l3.line .line_text{
            font-size:13px;

        }

        .bard_img {
            padding-top: 0;
        }

        #Container {
            width: 44px;
            height: 44px;
            background-size: 44px 44px;
            top: 22px;
        }

        #Panel {
            top: 50px;
            left: 9%;
        }

        #Text {
            top: 13px;
            left: 11px;

        }
        #Container2 {
            width: 44px;
            height: 44px;
            background-size: 44px 44px;
            top: 22px;
        }

        #Panel2 {
            top: 50px;
            left: 80%;
        }

        #Text2 {
            top: 13px;
            left: 11px;

        }

    }
</style>

<body>
<?php $this->beginBody() ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">


    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter44873437 = new Ya.Metrika({
                    id:44873437,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/44873437" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<div class="wrap">
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-right ">
            <div class="navbar-fixed-top container" id="magnitola">
                <div class="line" id="l1">
                    <div class="line_text" id="radio_test">РАДИО 'КОМНАТА С МЕХОМ' +18</div>
                </div>
                <div class="latvia" id="lt">
                    <p class="text-center" >
                       <img src='<?=\yii\helpers\Url::to('/img/barded3.png')?>' width="200px" id="player" class="bard_img">
                    </p>
                    <div id="Panel">
                        <div id="Container">
                            <span id="Text">80%</span>
                            <div id="Indicator" style="left: 57px; top: 28px; visibility: visible; zoom: 1; opacity: 1;">
                            </div>
                        </div>
                    </div>
                    <div id="Panel2">
                        <div id="Container2">
                            <span id="Text2">18+</span>
                            <div id="Indicator2" style="left: 57px; top: 28px; visibility: visible; zoom: 1; opacity: 1;">
                            </div>
                        </div>
                    </div>
                    <div id="buttons">
                        <button id="play_btn" value="On" class="on_button active-button"><span class="glyphicon glyphicon-play"></button>
                        <button id="stop_btn" value="stop" class="on_button"><span class="glyphicon glyphicon-pause"></button>
                        <button id="vk_btn" value="" class="on_button"><span class="fa fa-vk"></button>
                        <button id="2_btn" value="" class="on_button"><span class="glyphicon"></button>
                        <button id="3_btn" value="" class="on_button"><span class="glyphicon"></button>
                        <button id="4_btn" value="" class="on_button"><span class="glyphicon"></button>
                    </div>
                    <p class="text-center"></p>
                </div>
                <div class="line" id="l3">
                    <div class="line_text">
                        <h4 class="text-center" id="wellcome" style="cursor: pointer">
                            Ведущий "Бард, который перевернул ЗИЛ" Роман Беляшов
                        </h4>
                    </div>
                    <div class="line_cover" ></div>
                </div>
                <div id="img"></div>
                <audio id="au"  autoplay ></audio>

            </div>


                    
        </div>
    </div>
</div>

<div id="dev_res"></div>

<footer class="footer">
    <div class="container">

    </div>
</footer>

<script>


    jQuery(document).ready(function() {
        setInterval(function () {

            getRandItem('img');
        }, 30000);

        function getRandItem(block) {
            jQuery.ajax({
                type: "GET",
                url: "/item/rand-img-item/",
                success: function(html){
                    jQuery("#" + block)
                        .html(html)
                        .hide()
                        //.css({'height' : 100})
                        .show(1500);
                    var window_h = jQuery(document).height();
                    jQuery('#magnitola').height(400);
                    /*let mag_height = jQuery('#l1').height()+jQuery('#lt').height()+jQuery('#l3').height();
                    /*console.log(window_h);
                    console.log(mag_img_h);
                        $("#list2 .item").height(function(i,val){
                           return val+10;
                          });



                    makeSmallerHeightBlockIfBiggerThanWindow(window_h, mag_img_h, mag_height);*/


                    /*
                    var img = new Image();

                    img.onload = function() {
                        jQuery("#" + block).html(img).hide().show(1500);

                        if(img.height>500){
                            var height = img.height = 500;
                        }
                        else height = img.height+20;
                        jQuery('#l3').animate({
                            'height': height,
                        }, 1500);

                    };
                    img.src = html;
                    */


                }

            });
        }
    });


    $(document).ready(function() {

        jQuery.ajax({
            type: "GET",
            url: "/item/rand-img-item/",
            success: function(html){
                jQuery("#rand_img").html(html).hide().show(1500);
                jQuery('#img_rand').animate({
                    'height': 300,
                    'borderBottomWidth': '0px'
                }, 1500);

            }

        });

        height = 200;
        var au = document.getElementById('au');
        au.src = 'http://88.212.253.193:8000/test';
        //au.src = 'http://37.192.187.83:10088/test_mp3';

        jQuery(document).ready(function() {
            jQuery('#stop_btn').on('click',function(){
                jQuery("#au")[0].pause();
                jQuery("#stop_btn").addClass("active-button");
                jQuery("#play_btn").removeClass("active-button");
            });
            jQuery('#stop_btn')[0].click();//initial click on 'play' button to play music which doesn't seem to be working...
        });

        jQuery(document).ready(function() {
            jQuery('#play_btn').on('click',function(){
                jQuery("#au")[0].play();
                jQuery("#play_btn").addClass("active-button");
                jQuery("#stop_btn").removeClass("active-button");
            });
            jQuery('#play_btn')[0].click();//initial click on 'play' button to play music which doesn't seem to be working...
        });

        jQuery(document).ready(function() {
            jQuery('#vk_btn').on('click',function(){
                //https://vk.com/id439623451
                window.open('https://vk.com/id439623451', '_blank');
                // window.open('https://vk.com/club151192768', '_blank');
            });
            jQuery('#wellcome').on('click',function(){
                //https://vk.com/id439623451
                window.open('https://vk.com/id439623451', '_blank');
                // window.open('https://vk.com/club151192768', '_blank');
            });
        });

        au.volume = 0.8;


        jQuery.ajax({
            type: "GET",
            //url: "site/show-current-radio-tracks-test/",
            url: '<?=\yii\helpers\Url::to(['/site/show-current-radio-tracks-test/']) ?>',
            //url: 'http://37.192.187.83:10033/rockncontroll/datas/show-current-radio-tracks-test/',
            success: function(html){
                console.log(html);
                jQuery("#radio_test").html(html);
            }

        });

        jQuery.get('https://ipinfo.io/json', function (data) {
            siteBlockListener('radiorooma', 'body', data);
        });

        var player = document.getElementById('l3');

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


            jQuery(".accord h6:first").addClass("active");

            jQuery(".accord div").hide();

            jQuery(".accord h6").click(function() {

                jQuery(this).next("div").slideToggle("slow").siblings("div:visible").slideUp("slow");


                jQuery(this).toggleClass("active");

                jQuery(this).siblings("h6").removeClass("active");
            });

    });


    var player_test = document.getElementById('au_test');

    var stop_btn = document.getElementById('stop_btn');
    var play_btn = document.getElementById('play_btn');
    var info = document.getElementById('info');

    var radio_back = document.getElementById('radio_back');
    var canal = '';
    //stop_btn.style.display = 'none';

    // var test_button = document.getElementById('radio_test');

    var radioTestClasses = document.getElementById("radio_test").classList;


    setTimeout(function run() {

        jQuery.ajax({
            type: "GET",
            url: '<?=\yii\helpers\Url::to(['/site/show-current-radio-tracks-test/']) ?>',
            //url: "http://37.192.187.83:10033/rockncontroll/datas/show-current-radio-tracks-test/",
            success: function(html){
                jQuery("#radio_test").html(html);
            }

        });

        setTimeout(run, 10000);

    }, 10000);


    function onTest(){
        gtag_report_conversion();
        changeActiveClass(radioTestClasses);
        canal = 'test';
        player_test.src = 'http://88.212.253.193:8000/test';
        player_test.play();
        //player_test.autoplay = true;
        stop_btn.style.display = 'block';

        //if(stop_btn.style.display == 'none')
        // stop_btn.style.display = 'block';
        play_btn.style.display = 'none';

    }


    function stopRadio() {

        canal = '';

        player_test.pause();
        player_test.src = '';

        play_btn.style.display = 'block';
        stop_btn.style.display = 'none';
        if(radioTestClasses.contains('active-button')) radioTestClasses.remove('active-button');


        /* $.get('https://ipinfo.io/json', function (data) {

             siteBlockListener('radiorooma', 'stop_canal', data);
         });
         */

    }

    function showInfo() {
        window.location.href = 'site/show-track-info/';
    }

    function changeActiveClass(elAddClass, elRemClass_1='', elRemClass_2='') {
        if(elAddClass.contains('active-button')) return;
        else elAddClass.add('active-button');
        // if(elRemClass_1.contains('active-button')) elRemClass_1.remove('active-button');
        // if(elRemClass_2.contains('active-button')) elRemClass_2.remove('active-button');
    }

    function siteBlockListener(site, block, ip_json) {
        //console.log(ip_json);

        new Fingerprint2().get(function (result, components) {
            //console.log(result); //a hash, representing your device fingerprint
            //console.log(components); // an array of FP components

            //$.post("site/come-in/", { name: "John", time: "2pm" } );


            jQuery.ajax({
                url: "<?=\yii\helpers\Url::to(['/site/come-in/']) ?>",
                type: 'POST',
                data: {
                    components: JSON.stringify(components),
                    hash: result,
                    site: site,
                    block: block,
                    ip_json: ip_json,
                    _csrf: yii.getCsrfToken()
                },
                /*
                 success: function(html){
                    $("#dev_res").html(html);
                }
                */
            });

        });
    }

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
            window.location.href = 'http://radiorooma.ru/' + link + '.html';
            /*
            var au = document.getElementById('au');
            au.src = 'http://37.192.187.83:10080/'+link;
            au.volume = 0.5;

            var off_button = document.getElementById('off_button');
            var on_button = document.getElementById('on_button');
            on_button.style.display = 'none';
            off_button.style.display = 'block';
            */

        }

        function offAudio() {
            var au = document.getElementById('au');
            au.src = 'http://88.212.253.193:8000/test';
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
            au.src = 'http://88.212.253.193:8000/test';
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

<?php /*
<script>
    /*Выравнивание колонок

    jQuery(document).ready(function() {
        var page = document.getElementById('page');
        //console.log(height);
        height = page.clientHeight;
        var acc = document.getElementById('acc');
        var cats = document.getElementById('cats');
        //console.log(acc);
        var new_height = height + 25;
        acc.style.height = new_height+"px";
        cats.style.height = new_height+"px";
        //console.log(acc.style.height);
    });


    jQuery(document).ready(function() {
        var page = document.getElementById('page');
        var img = document.getElementById('img');
        var magnitola = document.getElementById('magnitola');
        console.log(window.innerHeight-magnitola.clientHeight);
        //console.log(magnitola.clientHeight);
        if(img === null)
        //height = page.clientHeight;
            height = window.innerHeight-magnitola.clientHeight - 70;
        else
        //height = page.clientHeight + 200;
            height = window.innerHeight-magnitola.clientHeight - 70;
        var acc = document.getElementById('acc');
        var cats = document.getElementById('cats');
        //console.log(acc);
        var new_height = height;
        //var img_height = new_height - 40;
        page.style.height = height+"px";
        acc.style.height = new_height+"px";
        cats.style.height = new_height+"px";
        /*
        if (img !== null && img.innerHeight > new_height) {
            img.style.height = (img.innerHeight - (img.innerHeight-new_height)) + "px";
            img.style.width = (img.innerWidth - (img.innerHeight-new_height)) + "px";
           // img.style.width = (img.innerWidth-40)+ "px";
        }


    });





</script>
 */?>
<script type="text/javascript" src="<?=\yii\helpers\Url::to('/js/MooToolsCore.js')?>"></script>
<script type="text/javascript" src="<?=\yii\helpers\Url::to('/js/rheostat.js')?>"></script>
<script type="text/javascript" src="<?=\yii\helpers\Url::to('/js/ua-parser.js')?>"></script>
<script type="text/javascript" src="<?=\yii\helpers\Url::to('/js/fingerprint2.min.js')?>"></script>
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
            //audio.volume = volume;

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

    function makeSmallerHeightBlockIfBiggerThanWindow(window_height, block_height, mag_height) {
        console.log(block_height);
        if(window_height < block_height)
            jQuery('#img_rand').css({'height' : (window_height-mag_height-100) });
    }


    //]]
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(56664523, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/56664523" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<?php $this->endBody() ?>

</body>
</html>


<?php $this->endPage() ?>

