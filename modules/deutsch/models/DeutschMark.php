<?php

namespace app\modules\deutsch\models;

use Yii;

/**
 * This is the model class for table "deutsch_mark".
 *
 * @property int $id
 * @property int $user_id
 * @property string $mark
 * @property int $time
 * @property int $word_id
 *
 * @property DeutschUser $user
 * @property DeutschItem $word
 */
class DeutschMark extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deutsch_mark';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('deutsch_db');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'mark'], 'required'],
            [['user_id', 'time', 'word_id'], 'integer'],
            [['mark'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => DeutschUser::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['word_id'], 'exist', 'skipOnError' => true, 'targetClass' => DeutschItem::className(), 'targetAttribute' => ['word_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'mark' => 'Mark',
            'time' => 'Time',
            'word_id' => 'Word ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(DeutschUser::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWord()
    {
        return $this->hasOne(DeutschItem::className(), ['id' => 'word_id']);
    }
}
