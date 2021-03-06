<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

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
    body{
        background-color:rgb(30, 29, 29);
    }
    #current_text {
        text-align: center;
        color: rgb(125, 37, 27);
    }
    #search-form{
        padding-bottom: 10px;
        padding-top: 10px;
    }
    .form-control{
        background-color: rgb(8, 10, 12);
        color: white;
    }
    h4,p, #silent{
        color: white;
        text-align: center;
        line-height: 1.5;
    }
    .container{
        background-color:rgb(30, 29, 29);
        /*background: rgb(30, 29, 29) url(img/col_pattern.jpg) repeat;*/
        color: white;
        height: 100%;
    }
    h3{
        text-align: center;
    }
    .be_carefull{
        color: pink;
    }
    .borded{
        border: 2px solid #1E90FF;
        padding: 3px;
        margin-bottom: 5px;
    }
    .btn-success{
        background-color: rgb(53, 68, 82);
        border-color: rgb(30, 144, 255);
        background: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgb(30, 144, 255)), to(rgb(0, 0, 20)));

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
        height: 70px;
        border: 1px solid rgba(0, 0, 0, 0);
        border-radius: 4px;
        margin-bottom: 5px;

    }
    .active-button{
        border-color: rgb(162, 162, 163);
        background: -webkit-gradient(linear, 0% 0%, 0% 79%, from(rgb(162, 162, 163)), to(rgb(0, 0, 20)));
    }

    button p{
        overflow: hidden; /* Обрезаем все, что не помещается в область */
        text-overflow: ellipsis; /* Добавляем многоточие */
        height: 60px;
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

    i.fa-soccer-ball-o, i.fa-bus, i.fa-language, i.fa-music {
        color: rgb(30, 144, 255);
        font-size: 40px;
        transition: 0.2s;
        border: 1px solid rgba(0, 0, 0, 0);
        border-radius: 4px;
    }

    i.fa-play {
        color: rgb(189, 217, 233);
        font-size: 40px;
        transition: 0.2s;
        border: 1px solid rgba(0, 0, 0, 0);
        border-radius: 4px;
    }


    i.fa-soccer-ball-o:hover, i.fa-bus:hover, i.fa-language:hover, i.fa-music:hover, i.fa-play:hover {
        color: orange;
        font-size: 35px;
    }

    .icons{
        cursor: pointer;
        padding-top: 10px;
    }

    .form-inline .form-group {
        width: 100%;
    }

    .jp-playlist ul {

        font-size: 1.3em;

    }

    h3 span{
        font-size: 10px;
    }

    .an{
        font-size: 15px;
    }

    .jp-details, .jp-playlist {
        width: 100%;
    //background-color: rgb(46, 46, 46);
        background: -webkit-gradient(linear, 0% 0%, 0% 79%, from(rgb(4, 21, 54)), to(rgb(0, 0, 20)));
        border-top: 1px solid rgb(0, 155, 227);
    }

    div.jp-type-playlist div.jp-playlist a {
        color: rgb(66, 139, 202);
        text-decoration: none;
    }

    .jp-interface {
        position: relative;
        background-color: rgb(4, 21, 54);
        width: 100%;
    }

    .jp-audio, .jp-audio-stream, .jp-video {
        border: 1px solid rgb(0, 155, 227);
        border-radius: 4px;
    }

    @media (min-width: 992px){
        .container {
            width: 800px;
        }
        .form-inline .form-group {
            width: 100%;
        }
    }

    @media (min-width: 768px) {

        .form-inline .form-control {
            display: inline-block;
            width: 100%;
            vertical-align: middle;
        }

    }

    @media (max-width: 400px) {
        h3{
            font-size: 18px;
        }
        .an{
            font-size: 12px;
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

<div class="container">
    <h3><i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i> Радио Комната С Мехом<i class="fa fa-cog fa-spin fa-fw" aria-hidden="true"></i></h3>

<?= $content ?>
</div>

<?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage() ?>

