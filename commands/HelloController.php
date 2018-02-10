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

        $recs = RadioItem::find()
            ->where('cat_id NOT IN (13,17,18,19)')
            ->all();

        shuffle($recs);
        $n = 0;

        foreach ($recs as $rec){
            if(!fwrite($f, $rec->audio . PHP_EOL)) echo 'no write';
            fwrite($f, "mp3/oho.mp3" . PHP_EOL);
            if ($n % 10 == 0) fwrite($f, "mp3/komnata_s_mehom.mp3" . PHP_EOL);
            $n++;
        }
        fclose($f);
    }
}
