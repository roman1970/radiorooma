<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * DiaryArticlesContent
 * @property int $id
 * @property int $articles_id
 * @property int $source_id
 * @property string $body
 * @property string $minititle
 * @property int $d_shown
 * @property string $img
 * @property int $page
 * @property int $count
 * @property int $likes
 * @property string $tags
 * @property string $status
 *
 */
class DiaryArticlesContent extends ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('my_db');
    }

    public static function tableName()
    {
        return 'qparticles_content';
    }

}