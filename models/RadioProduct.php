<?php

namespace app\models;

use Yii;

/**
 *
 * @property int $id
 * @property int $name
 * @property string $description
 * @property float $fats
 * @property float $carbohydrates
 * @property float $kkal
 * @property float $squirrels
 * @property float $ferrum
 * @property float $magnesium
 * @property float $cuprum
 * @property float $iodum
 * @property float $fluorum
 * @property float $zincum
 * @property float $cobaltum
 */
class RadioProduct extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'products';
    }

    public function rules()
    {
        return [
            [['name', 'description', 'kkal'], 'required'],
            [['kkal'], 'integer'],
            [['carbohydrates', 'fats', 'squirrels', 'ferrum', 'magnesium', 'cuprum', 'iodum', 'fluorum', 'zincum', 'cobaltum'], 'safe'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }
}

