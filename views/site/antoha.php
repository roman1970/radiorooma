
<style>
    .theme{
        text-align: center;
        box-shadow: inset 0 0 6px;
        border-radius: 5px;
        /* height: 200px;
         overflow: auto;*/
    }
    #section_page{
        text-align: center;
        /* overflow: auto;
         height: 200px;*/
        background-color: rgb(72, 73, 74);
        opacity: 0.8;
    }
    .accord{
        text-align: center;
        cursor: pointer;
        height: 700px;
        overflow-y: scroll;
    }
    #btn_bard_1, #btn_bard_2{
        display: none;
    }
    .accord::-webkit-scrollbar{ width: 10px; /* 1 - вертикальный скроллбар */}
    .accord::-webkit-scrollbar:horizontal{ height: 22px; /* 1 - горизонтальный скроллбар */}
    .accord::-webkit-scrollbar-button {background: #008000; /* 2 - кнопка */}
    .accord::-webkit-scrollbar-track {background: #008000;/* 3 - трек */}
    .accord::-webkit-scrollbar-track-piece { background: rgb(73, 148, 75); /* 4 – видимая часть трека */ }
    .accord::-webkit-scrollbar-thumb {background: #35ee2c; border-radius: 10px; -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); /* 5 - ползунок */}

</style>

<?php
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$this->title = 'Radiorooma';
?>

<?php /*
<div class="col-sm-3">
    <?php Pjax::begin(['id' => 'section_page_2']); ?>


    <?php foreach ($cats as $cat) : ?>
        <?php echo \yii\bootstrap\Html::a(
            $cat->name,
            '/category/'.$cat->id) ?>
        <?php /*

            <a href="/item/categoryitems/<?=$cat->id?>" class="list-group-item"><?=$cat->name?></a>
            <?= \yii\bootstrap\Html::a("Обновить", ['/item/categoryitems/'.$cat->id], ['class' => 'btn btn-lg btn-primary']) ?>


    <?php endforeach;  ?>
    <?php Pjax::end();

</div>
 */ ?>
<button type="button" class="btn btn-success" onclick="onRadio('bard_mp3', 'btn_bard_1', 'test_1')"  id="btn_bard_1">
    Обратно на Канал КОМНАТА С МЕХОМ!
</button>
<button type="button" class="btn btn-success" onclick="onRadio('test_mp3', 'test_1', 'btn_bard_1')" title="Первый канал" id="test_1">
    Канал ФИЗИКА ДЛЯ НАСТОЯЩИХ ПАНКОВ! Осторожно! Ненормативная лексика!
</button>
<div class="line" id="l11">
    <div class="line_text" id="rand2">РАДИО 'ОТ ШУБЕРТА ДО ШНУРОВА'</div>
    <div class="line_cover"></div>
</div>
<button type="button" class="btn btn-success" onclick="onRadio('bard_mp3', 'btn_bard_2', 'second_2')"  id="btn_bard_2">
    Обратно на Канал КОМНАТА С МЕХОМ!
</button>
<button type="button" class="btn btn-success" onclick="onRadio('second_mp3', 'second_2', 'btn_bard_2')" title="Второй канал" id="second_2">
    Канал САМАЯ РАЗНАЯ МУЗЫКА
</button>
<div class="line" id="l12">
    <div class="line_text" id="rand1">РАДИО 'ОТ ШУБЕРТА ДО ШНУРОВА'</div>
    <div class="line_cover"></div>
</div>


<div class="col-sm-8 theme">
    <div id="section_page">
        <?php /*<h4>Добро пожаловать в ротацию нашего Радио</h4>
        <input type="text" class="form-control" id="text"  placeholder="Ваша почта">
        <button type="button" class="btn btn-success">Отправить письмо с инструкциями</button>


        <p id="all_nenor">
            <button type="button" class="btn btn-success" onclick="onRadio('test_mp3')" >
                Программа "МузЫки Без Границ" <br> Осторожно! Ненормативная лексика!
            </button>
        </p>
        <p id="all_cenz">
            <button type="button" class="btn btn-success" onclick="onRadio('second_mp3')" >
                Программа "От Шуберта до Шнурова <br> не добираясь"
            </button>
        </p>
        <p id="all_bard">
            <button type="button" class="btn btn-success" onclick="onRadio('bard_mp3')" >
                Программа "Естественное и безобразное" <br> с участием Барда, который перевернул ЗИЛ
            </button>
        </p>
   */?>

        <?php if(isset($cur_item)) : ?>
            <div id="page">
                <h3><?=$cur_item->title?></h3>
                <p>(<?= $cur_item->source->title ?> - <?= $cur_item->source->author->name ?>)</p>
                <?php /*
            <form action="<?=Yii::$app->homeUrl?>">
                <button type="submit" class="btn btn-success">На главную</button>
            </form>
            */ ?>

                <p id="on_button"><button type="button" class="btn btn-success" onclick="onAudio('<?=$cur_item->audio?>')" >Воспроизвести</button></p>
                <p style="display: none" id="off_button"><button type="button" class="btn btn-success" onclick="offAudio()" >Переключиться на радио</button></p>
                <p id="like_button"><button type="button" class="btn btn-success" onclick="like('<?=$cur_item->id?>')" >Понравилось</button></p>
                <?php //<p><audio controls src="http://37.192.187.83:10080/<?=$item->audio"></audio></p> ?>
                <p id="summary">Понравилось: <?=$cur_item->likes?></p>
                <p class="txt"><?php echo nl2br($cur_item->text)?></p>
            </div>


        <?php endif; ?>


    </div>
</div>

<div class="col-sm-4 accord" id="acc">

    <?php foreach ($theme_items as $theme => $items) : ?>


        <h6><?= $theme ?></h6>
        <?php Pjax::begin(['id' => 'section_page']); ?>
        <?php foreach ($items as $item) : $one = \app\models\RadioItem::findOne((int)$item->item_id); ?>

            <p>
                <?=\yii\bootstrap\Html::a(
                    $one->title,
                    '/item/'.$one->alias, ['cursor' => 'pointer']) ?>
            </p>

        <?php endforeach; ?>
        <?php Pjax::end(); ?>


    <?php endforeach; ?>

</div>


<?php // \yii\bootstrap\Html::a("Обновить", ['/item/categoryitems/1'], ['class' => 'btn btn-lg btn-primary']) ?>

</div><!--/row-->
</div><!--/span-->
<script>

    var pl = 1;

    setInterval(function () {
        getBlockForMeta('gggg', 'test_mp3', 'rand2');
        getBlockForMeta('gggg', 'second_mp3', 'rand1');
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



</script>

<?php //<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation"> ?>
<div class="list-group">

