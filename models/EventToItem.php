<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_to_item".
 *
 * @property int $id
 * @property int $item_id
 * @property int $event_id
 * @property int $visitor_id
 * @property int $time
 *
 * @property RadioEvents $event
 */
class EventToItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_to_item';
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
            [['item_id', 'event_id', 'visitor_id', 'time'], 'required'],
            [['item_id', 'event_id', 'visitor_id', 'time'], 'integer'],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => RadioEvents::className(), 'targetAttribute' => ['event_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'event_id' => 'Event ID',
            'visitor_id' => 'Visitor ID',
            'time' => 'Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(RadioEvents::className(), ['id' => 'event_id']);
    }
}
