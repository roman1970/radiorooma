<?php
/**
 * @var \app\models\RadioItem $item
 * @var \app\models\CleverAnswer $ans
 */
?>
<style>
    .pic{
        width: 80%;
    }
    h2{
        margin: 0;
    }
    h2 img {
        vertical-align: bottom;
    }
    h3 span{
        font-size: 30px;
    }
    .cat{
        color: white;
    }
    .anons{
        color: rgb(255, 200, 46);
        font-size: 20px;
    }
    .title{
        color: rgb(244, 134, 104);
    }
    a {
        color: rgb(244, 134, 104);
        text-decoration: none;
    }
    .pic{
        border-radius: 25px;
    }
    p{
        font-size: 16px;
    }
    button p {
        height: 80px;
    }
    #hidden_audio{
        display: none;
    }
    .text{
        font-size: 18px;
        color: rgb(210, 105, 30);
    }

    .btn-success {
        background-color: rgb(53, 68, 82);
        border-color: rgb(100, 107, 124);
        background: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgb(100, 107, 124)), to(rgb(0, 0, 20)));
    }
    #text{
        max-height: 0px;
        overflow: hidden;
    }
</style>
<div class="container" style="text-align: center">
    <hr style="border: 2px solid rgb(244, 134, 104);">
    <h2>
        <span class="title"><?=$item->title?></span>
    </h2>

    <h6 class="text"><?=$item->text?></h6>
    <?php if($item->img) : ?>
        <img src="<?=$item->img ?>" class="pic"/>
    <?php endif; ?>
    <h6 class="anons"><?=$item->anons?></h6>
    <?php if($item->audio) : ?>
        <audio controls controlsList="nodownload" >
            <source src="/uploads/<?=$item->audio?>">
        </audio>
    <?php endif; ?>
    <h3 id="answers">
        <?php foreach ($ans as $an) :?>
            <p onclick="testAnswer(<?=$an->id?>,<?=$item->next_item?>)"><?=$an->ans?></p>
        <?php endforeach; ?>
    </h3>

    <hr style="border: 2px solid rgb(244, 134, 104);">
</div>
<script>

    function testAnswer(answer_id, klar_item_id)
    {
        $.ajax({
            type: "GET",
            url: "item/test-answer/",
            data: "answer_id=" + answer_id + "&item_id=" + klar_item_id,
            success: function(html){
                $("#answers").html(html);
            }

        });

    }

    $(".content_toggle").click(function(){
        $('#text').slideDown(300, function(){
            $(this).css({"display":"block", "max-height":"none"});
            $('.content_toggle').hide();
        });

        return false;
    });

</script>
