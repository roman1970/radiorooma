<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * RadioArticle
 * @property int $id
 * @property int $articles_id
 * @property string $body
 * @property string $minititle
 * @property int $d_shown
 * @property string $img
 * @property int $page
 * @property int $count
 * @property int $likes
 * @property string $tags
 * @property string $status
 *
 * @property Source $source
 * @property RadioArticle $article
 */
class RadioArticleContent extends ActiveRecord
{
    public static function tableName()
    {
        return 'articles_content';
    }

    public function getSource()
    {
        return $this->hasOne(Source::class, ['id' => 'source_id']);
    }

    public function getArticle()
    {
        return $this->hasOne(RadioArticle::class, ['id' => 'articles_id']);
    }

}