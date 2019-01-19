<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

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