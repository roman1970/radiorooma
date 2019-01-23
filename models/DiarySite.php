<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * DiarySite
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $theme
 *
 * @property RadioArticle[] $articles
 */
class DiarySite extends ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('my_db');
    }

    public static function tableName()
    {
        return 'qpsites';
    }
}