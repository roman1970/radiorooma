<h3><?=$item->title?></h3>
<h4><p><?=$item->cat->name?></p></h4>
<p><a href="/uploads/<?=$item->audio?>" download>Скачать файл</a>
<p><a href="<?=$item->alias?>" download>Поделиться ссылкой</a>
<p><?=nl2br($item->text)?></p>
<audio controls>
    <a href="/uploads/<?=$item->audio?>"></a>.
</audio>