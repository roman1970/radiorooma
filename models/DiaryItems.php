<?php

namespace app\models;

use \yii\db\ActiveRecord;
use Yii;

/**
 * Class DiaryItems
 * @package app\models
 *
 * @property integer $id
 * @property integer $source_id
 * @property string $text
 * @property string $tags
 * @property string $audio
 * @property string $img
 * @property string $title
 * @property string $audio_link
 * @property integer $radio_que
 * @property integer $play_status
 * @property string $in_work_prim
 * @property integer $cat_id
 * @property integer $is_next
 * @property integer $act_id
 * @property string $old_data
 * @property integer $cens
 * @property integer $bind_item_id
 * @property integer $published
 * @property integer $learned
 * @property integer $original_song_id
 * @property integer $phrase_gen_id
 */
class DiaryItems extends ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('my_db');
    }

    public static function tableName()
    {
        return 'items';
    }

}