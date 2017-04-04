<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "theme_items".
 *
 * @property int $id
 * @property int $theme_id
 * @property int $item_id
 * @property string $prim
 * @property string $title
 *
 * @property Items $item
 * @property Theme $theme
 */
class ThemeItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'theme_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['theme_id', 'item_id', 'prim', 'title'], 'required'],
            [['theme_id', 'item_id'], 'default', 'value' => null],
            [['theme_id', 'item_id'], 'integer'],
            [['prim'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => RadioItem::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['theme_id'], 'exist', 'skipOnError' => true, 'targetClass' => Theme::className(), 'targetAttribute' => ['theme_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'theme_id' => 'Theme ID',
            'item_id' => 'Item ID',
            'prim' => 'Prim',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(RadioItem::className(), ['id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheme()
    {
        return $this->hasOne(Theme::className(), ['id' => 'theme_id']);
    }
}
