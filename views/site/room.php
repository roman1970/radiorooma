<h3><?=$item->title?></h3>
<h4><p><?=$item->cat->name?></p></h4>
<p><a href="/uploads/<?=$item->audio?>" download>Скачать файл</a>
<p><?=nl2br($item->text)?></p>