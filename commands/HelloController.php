<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Category;
use app\models\RadioItem;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }


    /**
     * Пишет плейлист для радио
     */
    public function actionRoomPlayList(){
        //echo \Yii::getAlias('@webroot').PHP_EOL; exit;

        $site_map = fopen(\Yii::getAlias('@webroot')."/sitemap.xml", 'w');


        $content = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
            <urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"> 
           ";


        $f = fopen(\Yii::getAlias('@webroot')."/uploads/radio.txt", 'w');
        if(!$f) {
            echo 'can not open';
        }

        $shot = RadioItem::find()
            ->where('cat_id IN (1,3,4,6,9,14,15,16,12)')
            ->andWhere(['published' => 1])
            ->all();

        $long = RadioItem::find()
            ->where('cat_id IN (2,5,7,8,10)')
            ->andWhere(['published' => 1])
            ->all();

        $guests = RadioItem::find()
            ->where('cat_id IN (20)')
            ->andWhere(['published' => 1])
            ->all();

        shuffle($shot);
        shuffle($long);
        shuffle($guests);
        echo 'shot '.count($shot).PHP_EOL;
        echo 'long '.count($long).PHP_EOL;

        $little_length_arr = ($shot<=$long) ? $shot : $long;

        $got_ids = [];

        for($i=0;$i<count($little_length_arr);$i++){
            if($i%24 == 0) {
                $guest = $guests[rand(0, count($guests)-1)];
                $content .= $this->getInSiteMapItemXml($guest->alias, $guest->d_created);
                fwrite($f, $guest->audio . PHP_EOL);
            }
            if($shot[$i]->next_item) {
                //var_dump($got_ids);
                if(!in_array($shot[$i]->id, $got_ids)){
                    $content .= $this->getInSiteMapItemXml($shot[$i]->alias, $shot[$i]->d_created);
                    fwrite($f, $shot[$i]->audio . PHP_EOL);
                }
                $next = RadioItem::findOne($shot[$i]->next_item);
                if(!in_array($next->id, $got_ids)){
                    $content .= $this->getInSiteMapItemXml($next->alias, $next->d_created);
                    fwrite($f, $next->audio . PHP_EOL);
                }
                array_push($got_ids, $next->id);
            }
            else
                if(!in_array($shot[$i]->id, $got_ids)) {
                    $content .= $this->getInSiteMapItemXml($shot[$i]->alias, $shot[$i]->d_created);
                    fwrite($f, $shot[$i]->audio . PHP_EOL);
                }

            if($long[$i]->next_item) {
                if(!in_array($long[$i]->id, $got_ids)){
                    $content .= $this->getInSiteMapItemXml($long[$i]->alias, $long[$i]->d_created);
                    fwrite($f, $long[$i]->audio . PHP_EOL);
                }
                $next = RadioItem::findOne($long[$i]->next_item);
                if(!in_array($next->id, $got_ids)){
                    $content .= $this->getInSiteMapItemXml($next->alias, $next->d_created);
                    fwrite($f, $next->audio . PHP_EOL);
                }
                array_push($got_ids, $next->id);
            }
            else
                if(!in_array($long[$i]->id, $got_ids)){
                    $content .= $this->getInSiteMapItemXml($long[$i]->alias, $long[$i]->d_created);
                    fwrite($f, $long[$i]->audio . PHP_EOL);
                }

            fwrite($f, "mp3/ohohoho.mp3" . PHP_EOL);
            if ($i % 10 == 0) fwrite($f, "mp3/komnata_s_mehom.mp3" . PHP_EOL);

        }

        $content .=  "</urlset>";


        fclose($f);
        var_dump(fwrite($site_map, $content));
        fclose($site_map);
    }

    function getInSiteMapItemXml($item, $data){

        if($data) $cut_data = explode(' ',$data)[0];
        else  $cut_data = '2018-09-09';
        return "<url><loc>https://radiorooma.ru/".$item.".html</loc><lastmod>".$cut_data."</lastmod></url>";
    }

    /**
     * Добавляем радио айтемы гостей из директории с файлами
     * @param $root
     * @param $artist
     * @param int $cut_begin_symbols
     */
    function actionAddItemsToAuthor($root, $artist, $cut_begin_symbols=0)
    {

        $dir = \Yii::$app->params['music_dir'] . $root;
        //echo $dir;

        try {
            $files = scandir($dir);
        } catch (\ErrorException $e) {
            echo $e->getMessage() . PHP_EOL;
            return;
        }

        if (is_array($files)) {
            $files = array_diff($files, array('.', '..'));

            if (!$cat = Category::find()->where(['like', 'name', $artist])->one()) {
                echo 'cat ' . $artist . " is not exists " . PHP_EOL;
                exit;
            }

            foreach ($files as $file) {
                if (RadioItem::find()->where(['like', 'audio', $file])->one()) {
                    echo $file . " real " . PHP_EOL;
                } else {

                    $new_item = new RadioItem();
                    $new_item->cat_id = $cat->id;
                    $new_item->source_id = 327;
                    $new_item->title = substr(strstr($file, '.', true), $cut_begin_symbols);
                    $new_item->text = $file;
                    $new_item->anons = 'Наш гость '.$artist;
                    $new_item->tags = '';
                    $new_item->cens = 0;
                    $new_item->audio = 'mp3/' .$root. '/' . $file;
                    $new_item->img = '';

                    if($new_item->save(false)) echo 'Ok'.PHP_EOL;
                    else echo 'OOps'.PHP_EOL;
                }


            }
        }
        else {
                var_dump($files);
        }


    }
}
