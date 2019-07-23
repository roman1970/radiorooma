<?php
/**
 * @var \app\models\RadioItem $item
 */
?>
<style>
    img{
        width: 80%;
        /*height: 80%;*/
    }
    #img{
        border-radius: 15px;
        margin-top: 20px;
    }
</style>
<div id="page" >

    <?php /*

    <p id="on_button">
        <button type="button" class="btn btn-success"  >
            <?=\yii\bootstrap\Html::a(
                'Возьми',
                '/'.$item->alias.'.html',
                ['cursor' => 'pointer', 'target' => '_blank', 'id' => 'takee'])
            ?>
        </button>
    </p>
 */?>

    <p style="display: none" id="off_button"><button type="button" class="btn btn-success" onclick="offAudio()" >Переключиться на радио</button></p>
    <?php /*<p id="like_button"><button type="button" class="btn btn-success" onclick="like('<?=$item->id?>')" >Понравилось</button></p>
    <p><audio controls src="http://37.192.187.83:10080/<?=$item->audio"></audio></p>

    <p id="summary">Понравилось: <?=$item->likes?></p>*/?>
    <!--
    <img src='<?=\yii\helpers\Url::to('/img/poossusuddnnii-sshhkaff-s-knniiigigmaai_1559727712.jpg')?>' id="img" class="pic"/>
    -->
    <?php if($item->cat_id != 22) : ?>
        <h3><?=\yii\bootstrap\Html::a(
                $item->title,
                '/'.$item->alias.'.html',
                ['cursor' => 'pointer', 'target' => '_blank', 'id' => 'takee', 'style' => 'color:#35ee2c; text-decoration: none;'])
            ?>
        </h3>
        <p>(<?= $item->source->title ?> - <?= $item->source->author->name ?>)</p>
        <p class="txt"><?php echo nl2br($item->text)?></p>
    <?php endif; ?>
    <?php if($item->img) : ?>
        <img src="<?=$item->img ?>" id="img" class="pic"/>
    <?php endif; ?>
    <br>
    <?=\yii\bootstrap\Html::a(
        'Поделиться',
        '/'.$item->alias.'.html', ['cursor' => 'pointer', 'target' => '_blank']) ?>

</div>
<script>
    jQuery(document).ready(function() {
        var page = document.getElementById('page');
        var img = document.getElementById('img');
        var magnitola = document.getElementById('magnitola');
        // console.log(window.innerHeight-magnitola.clientHeight);
        //console.log(magnitola.clientHeight);
        if (img === null)
        //height = page.clientHeight;
            height = window.innerHeight - magnitola.clientHeight - 70;
        else
        //height = page.clientHeight + 200;
            height = window.innerHeight - magnitola.clientHeight - 70;
        var acc = document.getElementById('acc');
        var cats = document.getElementById('cats');
        //console.log(acc);
        var new_height = height;
        var img_height = new_height - 40;
        page.style.height = height + "px";
        acc.style.height = new_height + "px";
        cats.style.height = new_height + "px";
        if (img !== null && img.clientHeight > new_height) {
            img.style.height = (img_height-100) + "px";
        }
        console.log(acc.style.height);
    });
        /*

        jQuery('#img').each(function() {
            var maxWidth = jQuery('#page').width(); // Max width for the image
            var maxHeight = new_height-30;    // Max height for the image
            var ratio = 0;  // Used for aspect ratio
            var width = jQuery(this).width();    // Current image width
            var height = jQuery(this).height();  // Current image height

            // Check if the current width is larger than the max
            if(width > maxWidth){
                ratio = maxWidth / width;   // get ratio for scaling image
                jQuery(this).css("width", maxWidth); // Set new width
                jQuery(this).css("height", height * ratio);  // Scale height based on ratio
                height = height * ratio;    // Reset height to match scaled image
            }

            var width = jQuery(this).width();    // Current image width
            var height = jQuery(this).height();  // Current image height

            // Check if current height is larger than max
            if(height > maxHeight){
                ratio = maxHeight / height; // get ratio for scaling image
                jQuery(this).css("height", maxHeight);   // Set new height
                jQuery(this).css("width", width * ratio);    // Scale width based on ratio
                width = width * ratio;    // Reset width to match scaled image
            }
        });
    });

    $(document).ready(function() {
        $('.story-small img').each(function() {
            var maxWidth = 100; // Max width for the image
            var maxHeight = 100;    // Max height for the image
            var ratio = 0;  // Used for aspect ratio
            var width = $(this).width();    // Current image width
            var height = $(this).height();  // Current image height

            // Check if the current width is larger than the max
            if(width > maxWidth){
                ratio = maxWidth / width;   // get ratio for scaling image
                $(this).css("width", maxWidth); // Set new width
                $(this).css("height", height * ratio);  // Scale height based on ratio
                height = height * ratio;    // Reset height to match scaled image
            }

            var width = $(this).width();    // Current image width
            var height = $(this).height();  // Current image height

            // Check if current height is larger than max
            if(height > maxHeight){
                ratio = maxHeight / height; // get ratio for scaling image
                $(this).css("height", maxHeight);   // Set new height
                $(this).css("width", width * ratio);    // Scale width based on ratio
                width = width * ratio;    // Reset width to match scaled image
            }
        });

     */
</script>




