<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visitor_count".
 *
 * @property int $id
 * @property string $hash
 * @property int $count
 *
 * @property VisitBlock[] $visitBlocks
 * @property Visitor[] $visitors
 */
class VisitorCount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visitor_count';
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
            [['hash'], 'required'],
            [['count'], 'integer'],
            [['hash'], 'string', 'max' => 255],
            [['hash'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hash' => 'Hash',
            'count' => 'Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitBlocks()
    {
        return $this->hasMany(VisitBlock::className(), ['visitor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitors()
    {
        return $this->hasMany(Visitor::className(), ['visitor_id' => 'id']);
    }
}
