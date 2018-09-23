<h4 onclick="getCats()" style="cursor: pointer"><?=$cat?></h4>
<?php foreach ($items as $item) : ?>
    <a onclick="getItem(<?=$item->id?>)" style="cursor: pointer" ><?=$item->title?></a><br>
<?php endforeach; ?>
<script>
    function getCats(){
        jQuery.ajax({
            type: "GET",
            url: "/category/for-radio/",
            success: function(html){
                jQuery("#cats").html(html);
            }
        });
    }
</script>