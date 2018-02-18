<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

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


    public function actionRoomPlayList(){
        //echo \Yii::getAlias('@webroot').PHP_EOL; exit;
        $f = fopen(\Yii::getAlias('@webroot')."/uploads/radio.txt", 'w');
        if(!$f) {
            echo 'can not open';
        }

        $shot = RadioItem::find()
            ->where('cat_id IN (1,3,4,6,9,14,15,16,12)')
            ->all();

        $long = RadioItem::find()
            ->where('cat_id IN (2,5,7,8,10)')
            ->all();

        shuffle($shot);
        shuffle($long);
        echo 'shot '.count($shot).PHP_EOL;
        echo 'long '.count($long).PHP_EOL;

        for($i=0;$i<count($shot);$i++){
            if($shot[$i]->next_item) {
                fwrite($f, $shot[$i]->audio . PHP_EOL);
                $next = RadioItem::findOne($shot[$i]->next_item);
                fwrite($f, $next->audio . PHP_EOL);
            }
            else
                fwrite($f, $shot[$i]->audio . PHP_EOL);

            if($long[$i]->next_item) {
                fwrite($f, $long[$i]->audio . PHP_EOL);
                $next = RadioItem::findOne($long[$i]->next_item);
                fwrite($f, $next->audio . PHP_EOL);
            }
            else
                fwrite($f, $long[$i]->audio . PHP_EOL);

            fwrite($f, "mp3/oho.mp3" . PHP_EOL);
            if ($i % 10 == 0) fwrite($f, "mp3/komnata_s_mehom.mp3" . PHP_EOL);
        }


        fclose($f);
    }
}
