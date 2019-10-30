
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
    .lft_scroll{
        direction: rtl;
    }
    .accord{
        text-align: center;
        cursor: pointer;
        height: 700px;
        overflow-y: scroll;
    }
    .pic{
        height: 80%;
        border-radius: 25px;
        max-height: 80%;
        max-width: 100%
    }
    .css-adaptive {
        max-width: 70%;
        height: auto;
        padding: 10px;
    }
    .row{
        margin: 0;
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

$this->title = 'radiorooma.ru';
?>
<div>
    <img src='<?=
    //\yii\helpers\Url::to('/img/poossusuddnnii-sshhkaff-s-knniiigigmaai_1559727712.jpg')
    $img->img?>'
         style="max-width: 100%;"
         class="pic css-adaptive"/>
</div>

<?php
/*

<div class="col-sm-3 accord lft_scroll" id="cats">
    <h4>Категории</h4>
    <?php foreach ($cats as $cat) : ?>
        <a onclick="getCategory(<?=$cat->id?>)" style="cursor: pointer"><?=$cat->name?></a><br>
    <?php endforeach;  ?>
</div>

<div class="col-sm-6 theme">
    <div id="section_page">

    <?php if(isset($cur_item)) : ?>
        <div id="page" >
            <?php /*
            <p id="on_button">
                <button type="button" class="btn btn-success"  >
                    <?=\yii\bootstrap\Html::a(
                        'Возьми',
                        '/'.$cur_item->alias.'.html',
                        ['cursor' => 'pointer', 'target' => '_blank', 'id' => 'takee'])
                    ?>
                </button>
            </p>

            <p style="display: none" id="off_button">
                <button type="button" class="btn btn-success" onclick="offAudio()" >Переключиться на радио
                </button></p>
            <div class='row'>
                <div class='col-lg-6'>
                    <h3><?=\yii\bootstrap\Html::a(
                            $cur_item->title,
                            '/'.$cur_item->alias.'.html',
                            ['cursor' => 'pointer', 'target' => '_blank', 'id' => 'takee', 'style' => 'color:#35ee2c'])
                        ?>
                    </h3>
                    <p>(<?= $cur_item->source->title ?> - <?= $cur_item->source->author->name ?>)</p>
                    <p class="txt"><?php echo nl2br($cur_item->text)?></p>
                </div>
                <div class='col-lg-6'>
                    <img src='<?=
                    //\yii\helpers\Url::to('/img/poossusuddnnii-sshhkaff-s-knniiigigmaai_1559727712.jpg')
                    $img->img?>'
                         id="img" class="pic css-adaptive"/>

                </div>
            </div>

            <?=\yii\bootstrap\Html::a(
                'Поделиться',
                '/'.$cur_item->alias.'.html', ['cursor' => 'pointer', 'target' => '_blank']) ?>
        </div>

    <?php endif; ?>


    </div>
</div>

<div class="col-sm-3 accord" id="acc">
    <h4>Темы</h4>

    <?php foreach ($theme_items as $theme => $items) : ?>

        <h6><?= $theme ?></h6>
        <div id="section_page">

        <?php foreach ($items as $item) : $one = \app\models\RadioItem::findOne((int)$item->item_id); ?>
            <p>
                <a onclick="getItem(<?=$one->id?>)" style="cursor: pointer" ><?=$one->title?></a><br>
            </p>

        <?php endforeach; ?>

        </div>

    <?php endforeach; ?>

</div>
 */?>

<script>
    function getCategory(id){
        jQuery.ajax({
            type: "GET",
            url: "/category/items/"+id,
            success: function(html){
                jQuery("#cats").html(html);
            }

        });
    }

    function getItem(id){
        jQuery.ajax({
            type: "GET",
            url: "/item/item/"+id,
            success: function(html){
                jQuery("#page").html(html);
            }

        });
    }

</script>


<?php // \yii\bootstrap\Html::a("Обновить", ['/item/categoryitems/1'], ['class' => 'btn btn-lg btn-primary']) ?>

<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
    <div class="list-group">





      