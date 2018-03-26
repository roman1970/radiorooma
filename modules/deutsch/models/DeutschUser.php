<?php

namespace app\modules\deutsch\models;

use Yii;

/**
 * This is the model class for table "deutsch_user".
 *
 * @property int $id
 * @property string $name
 * @property string $pseudo
 * @property string $hash
 *
 * @property DeutschMark[] $deutschMarks
 * @property DeutschTournament[] $deutschTournaments
 */
class DeutschUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deutsch_user';
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
            [['name', 'pseudo', 'hash'], 'required'],
            [['name', 'pseudo', 'hash'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pseudo' => 'Pseudo',
            'hash' => 'Hash',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeutschMarks()
    {
        return $this->hasMany(DeutschMark::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeutschTournaments()
    {
        return $this->hasMany(DeutschTournament::className(), ['user_id' => 'id']);
    }
}
