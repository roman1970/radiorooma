<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "theme".
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 *
 * @property ThemeItems[] $themeItems
 */
class Theme extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'theme';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'alias' => 'Alias',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThemeItems()
    {
        return $this->hasMany(ThemeItems::className(), ['theme_id' => 'id']);
    }
}
