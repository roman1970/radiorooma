<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "radio_events".
 *
 * @property int $id
 * @property string $dom_id
 */
class RadioEvents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'radio_events';
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
            [['dom_id'], 'required'],
            [['dom_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dom_id' => 'Dom ID',
        ];
    }
}
