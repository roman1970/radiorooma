<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * RadioSite
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $theme
 *
 * @property RadioArticle[] $articles
 */
class RadioSite extends ActiveRecord
{
    public static function tableName()
    {
        return 'sites';
    }

    public function getArticles()
    {
        return $this->hasMany(RadioArticle::class, ['site_id' => 'id']);
    }

}