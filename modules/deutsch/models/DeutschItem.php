<?php

namespace app\modules\deutsch\models;

use Yii;

/**
 * This is the model class for table "deutsch_item".
 *
 * @property int $id
 * @property string $d_word
 * @property string $d_phrase
 * @property string $d_word_translation
 * @property string $d_phrase_translation
 * @property string $d_word_transcription
 * @property string $d_phrase_transcription
 * @property int $shown
 * @property string $audio_link
 * @property string $audio_phrase_link
 *
 * @property DeutschMark[] $deutschMarks
 */
class DeutschItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deutsch_item';
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
            [['d_word', 'd_phrase', 'd_word_translation', 'd_phrase_translation', 'd_word_transcription', 'd_phrase_transcription', 'audio_link', 'audio_phrase_link'], 'required'],
            [['shown'], 'integer'],
            [['d_word', 'd_phrase', 'd_word_translation', 'd_phrase_translation', 'd_word_transcription', 'd_phrase_transcription'], 'string', 'max' => 255],
            [['audio_link', 'audio_phrase_link'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'd_word' => 'D Word',
            'd_phrase' => 'D Phrase',
            'd_word_translation' => 'D Word Translation',
            'd_phrase_translation' => 'D Phrase Translation',
            'd_word_transcription' => 'D Word Transcription',
            'd_phrase_transcription' => 'D Phrase Transcription',
            'shown' => 'Shown',
            'audio_link' => 'Audio Link',
            'audio_phrase_link' => 'Audio Phrase Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeutschMarks()
    {
        return $this->hasMany(DeutschMark::className(), ['word_id' => 'id']);
    }
}
