<style>
    .pic{
        height: 80%;
        border-radius: 25px;
        max-height: 80%;
        max-width: 100%;
        background-color: rgba(119, 118, 103, 0.9);
        opacity: 0.7;
        /**/

    }
    .css-adaptive {
        max-width: 100%;
        height: auto;
        padding: 10px;
    }
    .row{
        margin: 0;
    }
    /*
    .image-container {
        position: relative;
    }
    .image-container {
        position: absolute;
        background-color: rgba(119, 118, 103, 0.5);
    }
    */

</style>
<div class="image-container">
<img src='<?=
//\yii\helpers\Url::to('/img/poossusuddnnii-sshhkaff-s-knniiigigmaai_1559727712.jpg')
$img->img
?>'
     style="max-width: 100%;"
     id="img_rand"
     class="pic css-adaptive"/>
</div>
<p style="text-align: center">&copy; "Комната с мехом" <?= date('Y') ?></p>
<script>

    (function () {
        let window_h = jQuery(window).height();
        let mag_img_h = jQuery('#magnitola').height();
        let mag_height = jQuery('#l1').height()+jQuery('#lt').height()+jQuery('#l3').height();
        console.log(window_h);
        console.log(mag_img_h);

        if(window_h<mag_img_h)
            jQuery('#img_rand').css({'height' : (window_h-mag_height) });
    })();

</script>