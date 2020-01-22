<?php
namespace app\models;

use app\models\RadioItem;
use yii\db\ActiveRecord;
use Yii;

/**
* This is the model class for table "clever_answers".
*
* @property int $id
* @property int $item_id
* @property string $ans
* @property int $right
*
* @property RadioItem $item
*/
class CleverAnswer extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%clever_answers}}';
    }

    public function getItem()
    {
        return $this->hasOne(\app\models\RadioItem::class, ['id' => 'item_id']);
    }

}