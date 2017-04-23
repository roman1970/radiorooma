<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "songs".
 *
 * @property int $id
 * @property int $source_id
 * @property string $title
 * @property string $text
 * @property string $link
 *
 * @property Source $source
 */
class Songs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'songs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['source_id', 'title', 'text', 'link'], 'required'],
            [['source_id'], 'default', 'value' => null],
            [['source_id'], 'integer'],
            [['text'], 'string'],
            [['title', 'link'], 'string', 'max' => 255],
            [['source_id'], 'exist', 'skipOnError' => true, 'targetClass' => Source::className(), 'targetAttribute' => ['source_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'source_id' => 'Source ID',
            'title' => 'Title',
            'text' => 'Text',
            'link' => 'Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(Source::className(), ['id' => 'source_id']);
    }
}
