<h4>Категории</h4>

<?php foreach ($cats as $cat) : ?>

    <a onclick="getCategory(<?=$cat->id?>)" style="cursor: pointer"><?=$cat->name?></a><br>

<?php endforeach;  ?>