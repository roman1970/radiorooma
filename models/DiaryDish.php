<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dish".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $kkal
 * @property float $carbohydrates
 * @property float $fats
 * @property float $squirrels
 * @property float $ferrum
 * @property float $magnesium
 * @property float $cuprum
 * @property float $iodum
 * @property float $fluorum
 * @property float $zincum
 * @property float $cobaltum
 *
 * @property Ate[] $ates
 */
class DiaryDish extends \yii\db\ActiveRecord
{

    public static function getDb()
    {
        return Yii::$app->get('my_db');
    }

    public static function tableName()
    {
        return 'dish';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'kkal'], 'required'],
            [['kkal'], 'integer'],
            [['carbohydrates', 'fats', 'squirrels', 'ferrum', 'magnesium', 'cuprum', 'iodum', 'fluorum', 'zincum', 'cobaltum'], 'safe'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'kkal' => 'Kkal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtes()
    {
        return $this->hasMany(DiaryDish::className(), ['dish_id' => 'id']);
    }
}
