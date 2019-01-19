<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * RadioArticle
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property int $d_created
 * @property string $img
 * @property string $anons
 * @property string $text
 * @property string $audio
 * @property string $video
 * @property string $tags
 * @property string $status
 *
 * @property RadioArticleContent[] $content
 * @property RadioSite $site
 * @property Source $source
 */
class RadioArticle extends ActiveRecord
{
    public static function tableName()
    {
        return 'articles';
    }

    public function getSource()
    {
        return $this->hasOne(Source::class, ['id' => 'source_id']);
    }

    public function getSite()
    {
        return $this->hasOne(RadioSite::class, ['id' => 'site_id']);
    }

    public function getContent()
    {
        return $this->hasMany(RadioArticleContent::class, ['articles_id' => 'id']);
    }

}