<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * DiaryArticles
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property int $d_created
 * @property int $site_id
 * @property string $img
 * @property string $anons
 * @property string $text
 * @property string $audio
 * @property string $video
 * @property string $tags
 * @property string $status
 *
 */
class DiaryArticles extends ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('my_db');
    }

    public static function tableName()
    {
        return 'qparticles';
    }

}