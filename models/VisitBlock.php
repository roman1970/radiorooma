<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visit_block".
 *
 * @property int $id
 * @property int $time
 * @property int $visitor_id
 * @property string $site
 * @property string $block
 * @property string $ip
 * @property string $hostname
 * @property string $city
 * @property string $region
 * @property string $country
 * @property string $loc
 * @property string $org
 * @property string $postal
 *
 * @property VisitorCount $visitor
 */
class VisitBlock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visit_block';
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
            [['time', 'visitor_id', 'site', 'block', 'ip', 'hostname', 'city', 'region', 'country', 'loc', 'org', 'postal'], 'required'],
            [['time', 'visitor_id'], 'integer'],
            [['site', 'block'], 'string', 'max' => 255],
            [['ip', 'hostname', 'city', 'region', 'country', 'loc', 'org', 'postal'], 'string', 'max' => 225],
            [['visitor_id'], 'exist', 'skipOnError' => true, 'targetClass' => VisitorCount::className(), 'targetAttribute' => ['visitor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'visitor_id' => 'Visitor ID',
            'site' => 'Site',
            'block' => 'Block',
            'ip' => 'Ip',
            'hostname' => 'Hostname',
            'city' => 'City',
            'region' => 'Region',
            'country' => 'Country',
            'loc' => 'Loc',
            'org' => 'Org',
            'postal' => 'Postal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitor()
    {
        return $this->hasOne(VisitorCount::className(), ['id' => 'visitor_id']);
    }
}
