<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visit_error".
 *
 * @property int $id
 * @property int $time
 * @property string $text
 */
class VisitError extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visit_error';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('my_db');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time', 'text'], 'required'],
            [['time'], 'integer'],
            [['text'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'text' => 'Text',
        ];
    }
}
