<?php /*
//echo '<h1 style="text-align: center; padding-top: 50px;">АНТРАКТ, НЕГОДЯИ!</h1>'; exit;
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
 */
?>
<!DOCTYPE html>
<head>
    <meta charset='utf-8'>
    <title>Deutsch</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
    <meta name='author' content=''>

    <!--[if lt IE 9]>
    <script src='../html5shim.googlecode.com/svn/trunk/html5.js' tppabs='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
    <![endif]-->
    <!-- Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/ua-parser.js"></script>
    <script src="js/fingerprint2.min.js"></script>
    <script src="js/jQuery-autoComplete-master/jquery.auto-complete.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jPlayer-2.9.2/dist/jplayer/jquery.jplayer.min.js"></script>
    <script src="js/jPlayer-2.9.2/src/javascript/add-on/jplayer.playlist.js"></script>
    <script src="js/jquery-cookie/jquery.cookie.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,100italic,100,400italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    <!-- Stylesheets -->
    <link href='css/normalize.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/font-awesome.css">
    <link href='css/style.css' rel='stylesheet'>
    <link href='js/jQuery-autoComplete-master/jquery.auto-complete.css' rel='stylesheet'>
    <link href='css/jquery-ui.css' rel='stylesheet'>

</head>
<style>
body{
    background-color: rgb(125, 75, 15);
    }

    td, th, p, h3 {
    text-align: center;
    }

    .container{
    background-color:rgb(67, 37, 14);
        /*background: rgb(30, 29, 29) url(img/col_pattern.jpg) repeat;*/
        color: white;
        height: 1000px;
    }

    #card{
        text-align: center;
        border: 5px solid rgb(89, 96, 104);
        border-radius: 4px;
        margin-bottom: 10px;
        margin-top: 5px;
    }

    .btn-success{
    background-color: rgb(164, 180, 195);
        border-color: rgb(69, 70, 73);
        background: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgb(168, 182, 196)), to(rgb(0, 0, 0)));

    }
    .red{
    background-color: rgb(125, 37, 27);
        border-color: rgb(255, 42, 55);
    }
    .btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open .dropdown-toggle.btn-success {
    /*color: rgb(40, 40, 47);
    background-color: rgba(236, 231, 8, 0);*/
    border-color: rgb(162, 162, 163);
        background: -webkit-gradient(linear, 0% 0%, 0% 79%, from(rgb(162, 162, 163)), to(rgb(0, 0, 20)));
    }
    button{
    width: 100%;
    height: 60px;
        border: 1px solid rgba(0, 0, 0, 0);
        border-radius: 4px;
        margin-bottom: 5px;
    }

    button p{
    font-size: 15px;
    }
    .active-button{
    border-color: rgb(162, 162, 163);
        background: -webkit-gradient(linear, 0% 0%, 0% 79%, from(rgb(162, 162, 163)), to(rgb(0, 0, 20)));
    }


    .btn{
    height: 50px;
    }

    .btn:hover{
    //background-color: rgb(125, 37, 27);
    border-color: rgb(255, 42, 55);
        color: rgb(255, 42, 55);
        background: -webkit-gradient(linear, 0% 0%, 0% 79%, from(rgb(255, 42, 55)), to(rgb(0, 0, 20)));
    }

    .thin{
    height: 35px;
        color: #f5c86b;
        background-color: rgb(125, 37, 27);
    }


</style>
<body>
    <div class="container">

        <div id="card"></div>

        <div id="auth-form">
            <p id="auth">
                <input type="text" class="form-control" id="nick" placeholder="введите Ник">
            </p>
            <button type="submit" class="btn-success" onclick="logAuth()" id="log_btn"><p>Войти</p></button>
        </div>

        <div id="search-form">
            <p>
                <input type="text" class="form-control" id="word" placeholder="Начните вводить перевод">
            </p>
        </div>

        <button type="submit" class="btn-success" onclick="onTest()" id="test"><p>Проверить</p></button>
        <button type="submit" class="btn-success" onclick="openTranslation()" id="open_translation"><p>Открыть перевод</p></button>
        <button type="submit" class="btn-success" onclick="nextCard()" id="next"><p>Следующая карточка</p></button>
        <button type="submit" class="btn-success thin" onclick="showWords()" id="show_words"><p>Посмотреть слова</p></button>

        <div id="tour">

        </div>

    </div>
</body>
<script id="userId"></script>

<script>


$(document).ready(function() {
    $('#word').focus(
        function () {
            $(this).select();
        });

    $('#word').autoComplete({
            minChars: 3,
            source: function (term, suggest) {
        term = term.toLowerCase();

        $.getJSON("http://servyz.xyz:8098/datas/translations/", function (data) {
            console.log(data);
            choices = data;
            var suggestions = [];
            for (i = 0; i < choices.length; i++)
                        if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
            suggest(suggestions);

        }, "json");

    }
        });

        $.ajax({
            type: "GET",
            url: "http://servyz.xyz:8098/datas/get-word-card/",
            success: function(html){
        $("#card").html(html);
    }

        });


        var word_form = document.getElementById('word');
        var open_translation = document.getElementById('open_translation');
        var test_btn = document.getElementById('test');
        var card = document.getElementById('card');
        var next = document.getElementById('next');
        var auth_form = document.getElementById('auth-form');
        var user_id = 0;



        word_form.style.display = 'none';
        open_translation.style.display = 'none';
        test_btn.style.display = 'none';
        card.style.display = 'none';
        next.style.display = 'none';


        /*$.get('https://ipinfo.io/json', function (data) {

         siteBlockListener('888', 'body', data);
         });
         */

        if($.cookie('the_cookie') == 'Рома' || $.cookie('the_cookie') == 'мама' || $.cookie('the_cookie') == 'Мишич') {
            var user = $.cookie('the_cookie');
            auth_form.style.display = 'none';
            $.ajax({
                type: "GET",
                url: "http://servyz.xyz:8098/datas/login/",
                data: "name=" + user,
                success: function(resp){
                $("#userId").html('var user_id = ' + resp );
                $.ajax({
                        type: "GET",
                        url: "http://servyz.xyz:8098/datas/get-marks/",
                        data: "id=" + resp,
                        success: function(resp){
                    $("#tour").html(resp);

                }

                    });
                }

            });

            word_form.style.display = 'block';
            open_translation.style.display = 'block';
            test_btn.style.display = 'block';
            card.style.display = 'block';
            next.style.display = 'block';
        }

    });

    function onTest() {
        var word = $("#word").val();
        var auth_form = document.getElementById('auth-form');
        var test_btn = document.getElementById('test');
        auth_form.style.display = 'none';
        translation.style.display = 'block';
        open_translation.style.display = 'none';
        test_btn.style.display = 'none';

        //console.log(user_id);

        if(word == '') {
            alert('Вы не выбрали ответ!');
            return;
        }

        $.ajax({
            type: "POST",
            url: "http://servyz.xyz:8098/datas/test-translation/",
            data:'word=' + word +
        '&id=' + word_id +
        '&user_id=' + user_id,
            success: function(html){
            $("#tour").html(html);
            $("body").scrollTop(0);

        }

        });

    }

    function openTranslation() {
        $.ajax({
            type: "POST",
            url: "http://servyz.xyz:8098/datas/test-translation-fail/",
            data:
            'id=' + word_id +
            '&user_id=' + user_id,
            success: function(){
            var translation = document.getElementById('translation');
            var word_form = document.getElementById('word');
            var open_translation = document.getElementById('open_translation');
            var test_btn = document.getElementById('test');

            translation.style.display = 'block';
            word_form.style.display = 'none';
            open_translation.style.display = 'none';
            test_btn.style.display = 'none';
            $("body").scrollTop(0);
        }

        });

    }

    function logAuth(){
        var nick = $("#nick").val();
        $.cookie('the_cookie', nick, { expires: 90 });
        document.location.reload();
    }

    function nextCard() {
        if( document.getElementById('test').style.display == 'block'){
            $.ajax({
                type: "POST",
                url: "http://servyz.xyz:8098/datas/test-translation-fail/",
                data:
                'id=' + word_id +
                '&user_id=' + user_id,
                success: function(){
                //console.log('gg ');
                document.location.reload();
            }

            });
        }

        else document.location.reload();

    }

    function onPlay() {

        var aud_play = document.getElementById('aud_play');
        aud_play.play();

    }

    function onPlayPhrase() {
        var aud_play_phrase = document.getElementById('aud_play_phrase');
        aud_play_phrase.play();
    }

    function showWords() {
        document.location.href = "http://servyz.xyz:888/deutsch_show.html";

    }
</script>

