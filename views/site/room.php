<div class="container">
    <h3><?=$item->title?></h3>
    <h4><p><?=$item->cat->name?></p></h4>
    <audio controls>
        <source src="/uploads/<?=$item->audio?>">
    </audio>
    <p><a href="/uploads/<?=$item->audio?>" download>Скачать файл</a>
    <p><?=nl2br($item->text)?></p>
</div>
