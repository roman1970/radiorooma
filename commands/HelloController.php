<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Category;
use app\models\DiaryArticles;
use app\models\DiaryArticlesContent;
use app\models\DiaryDish;
use app\models\DiaryItems;
use app\models\DiarySite;
use app\models\RadioArticle;
use app\models\RadioArticleContent;
use app\models\RadioItem;
use app\models\RadioProduct;
use app\models\RadioSite;
use app\models\Source;
use yii\console\Controller;
use Yii;

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

        $unsorted_stories = RadioItem::find()
            ->where('cat_id IN (21)')
            ->andWhere(['published' => 1])
            ->orderBy('id')
            ->all();

        shuffle($shot);
        shuffle($long);
        shuffle($guests);
        echo 'shot '.count($shot).PHP_EOL;
        echo 'long '.count($long).PHP_EOL;

        $little_length_arr = ($shot<=$long) ? $shot : $long;

        $got_ids = [];
        $stories_counter = 0;

        for($i=0;$i<count($little_length_arr);$i++){

            if($i%24 == 1) {
                $guest = $guests[rand(0, count($guests)-1)];
                $content .= $this->getInSiteMapItemXml($guest->alias, $guest->d_created);
                fwrite($f, $guest->audio . PHP_EOL);
            }
            if($i%18 == rand(2,17)) {
                if(isset($unsorted_stories[$stories_counter])) {
                    $story = $unsorted_stories[$stories_counter];
                    $content .= $this->getInSiteMapItemXml($story->alias, $story->d_created);
                    fwrite($f, $story->audio . PHP_EOL);
                }
                $stories_counter++;
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
                /**
                 * @var $next RadioItem
                 */
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
        return "<url><loc>http://radiorooma.ru/".$item.".html</loc><lastmod>".$cut_data."</lastmod></url>";
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

    public function actionCopyDishMysqlToProductPostgres()
    {
        /**
         * @var DiaryDish[] $dishes
         */
        $dishes = DiaryDish::find()->all();

        foreach ($dishes as $dish)
        {
            $radio_product = new RadioProduct();

            $radio_product->name = $dish->name;
            $radio_product->description = $dish->description;
            $radio_product->kkal = $dish->kkal;
            $radio_product->carbohydrates = $dish->carbohydrates;
            $radio_product->fats = $dish->fats;
            $radio_product->squirrels = $dish->squirrels;
            $radio_product->ferrum = $dish->ferrum;
            $radio_product->magnesium = $dish->magnesium;
            $radio_product->cuprum = $dish->cuprum;
            $radio_product->iodum = $dish->iodum;
            $radio_product->fluorum = $dish->fluorum;
            $radio_product->zincum = $dish->zincum;
            $radio_product->cobaltum = $dish->cobaltum;

            try {
                $radio_product->save(false);
                echo $radio_product->id.' '.PHP_EOL;
            } catch (\Exception $e) {
                echo $e->getMessage(); exit;
            }
        }
    }

    public function actionCopySitesMysqlToPostgres()
    {
        /**
         * @var DiarySite[] $sites
         */
        $sites = DiarySite::find()->all();
        foreach ($sites as $site)
        {
            $radio_site = new RadioSite();

            $radio_site->title = $site->title;
            $radio_site->url = $site->url;
            $radio_site->theme = $site->theme;

            try {
                $radio_site->save(false);
                echo $radio_site->id.' '.PHP_EOL;
            } catch (\Exception $e) {
                echo $e->getMessage(); exit;
            }

        }

    }

    /**
     * /usr/bin/php7.0 yii hello/copy-articles-mysql-to-postgres
     */
    public function actionCopyArticlesMysqlToPostgres()
    {
        /**
         * @var DiaryArticles[] $articles
         */
        $articles = DiaryArticles::find()->all();
        foreach ($articles as $article)
        {
            $radio_article = new RadioArticle();

            $radio_article->id = $article->id;
            $radio_article->title = $article->title;
            $radio_article->alias = $article->alias;
            $radio_article->d_created = $article->d_created;
            $radio_article->img = $article->img;
            $radio_article->anons = $article->anons;
            $radio_article->text = $article->text;
            $radio_article->audio = $article->audio;
            $radio_article->video = $article->video;
            $radio_article->tags = $article->tags;
            $radio_article->status = $article->status;
            $radio_article->site_id = 16;

            try {
                $radio_article->save(false);
                echo $radio_article->id.' '.PHP_EOL;
            } catch (\Exception $e) {
                echo $e->getMessage(); exit;
            }
        }

    }


    /**
     * /usr/bin/php7.0 yii hello/copy-articles-content-mysql-to-postgres
     */
    public function actionCopyArticlesContentMysqlToPostgres()
    {
        /**
         * @var DiaryArticlesContent[] $article_content
         */
        $article_content = DiaryArticlesContent::find()->all();

        foreach ($article_content as $content){

            $radio_article_content = new RadioArticleContent();

            $radio_article_content->id = $content->id;
            $radio_article_content->articles_id = $content->articles_id;
            $radio_article_content->body = $content->body;
            $radio_article_content->minititle = $content->minititle;
            $radio_article_content->img = $content->img;
            $radio_article_content->page = $content->page;
            $radio_article_content->count = $content->count;
            $radio_article_content->likes = $content->likes;
            $radio_article_content->d_shown = $content->d_shown;
            if(Source::findOne($content->source_id))
                $radio_article_content->source_id = $content->source_id;
            else
                $radio_article_content->source_id = 327;

            try {
                $radio_article_content->save(false);
                echo $radio_article_content->id.' '.PHP_EOL;
            } catch (\Exception $e) {
                echo $e->getMessage(); exit;
            }

        }

    }

    public function actionCopyImgItemsMysqlToPostgres()
    {
        $imgs = DiaryItems::find()->where(['cat_id' => 259])->all();

        /**
         * @var DiaryItems $img
         */
        foreach ($imgs as $img){
           // echo $img->img.PHP_EOL;
            $radio_item = new RadioItem();
            $radio_item->cat_id = 22;
            $radio_item->source_id = $img->source_id;
            $radio_item->title = $img->title;
            $radio_item->text = $img->text;
            $radio_item->anons = '';
            $radio_item->tags = $img->tags;
            $radio_item->audio = $img->audio_link;
            $radio_item->cens = $img->cens;
            $radio_item->img = $img->img;
            $radio_item->published = 1;
            if ($radio_item->save(false)) echo "added ".$radio_item->id.PHP_EOL;
            else echo "not added ".$radio_item->id.PHP_EOL;
        }

    }
}
