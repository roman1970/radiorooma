<style>
    .pic{
        height: 80%;
        border-radius: 25px;
        max-height: 80%;
        max-width: 100%
    }
    .css-adaptive {
        max-width: 100%;
        height: auto;
        padding: 10px;
    }
    .row{
        margin: 0;
    }
</style>
<div>
<img src='<?=
//\yii\helpers\Url::to('/img/poossusuddnnii-sshhkaff-s-knniiigigmaai_1559727712.jpg')
$img->img?>'
     style="max-width: 100%;"
     id="img_rand"
     class="pic css-adaptive"/>
</div>
<script>
    var img_rand = document.getElementById('img_rand');

    console.log(img_rand.height);

    jQuery(document).ready(function() {
        setInterval(function () {
            getRandItem('wellcome');
        }, 30000);

        function getRandItem(block) {
            jQuery.ajax({
                type: "GET",
                url: "/item/rand-img-item/",
                success: function(html){
                    jQuery("#" + block).html(html).hide().show(1500);
                    jQuery('#l3').animate({
                        'height': img_rand.height,
                        'borderBottomWidth': '0px'
                    }, 1500);

                }

            });
        }
    });
</script>

