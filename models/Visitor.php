<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visitor".
 *
 * @property int $id
 * @property int $time
 * @property int $visitor_id
 * @property string $site
 * @property string $block
 * @property string $user_agent
 * @property string $language
 * @property int $color_depth
 * @property string $pixel_ratio
 * @property int $hardware_concurrency
 * @property int $resolution_x
 * @property int $resolution_y
 * @property int $available_resolution_x
 * @property int $available_resolution_y
 * @property int $timezone_offset
 * @property int $session_storage
 * @property int $local_storage
 * @property int $indexed_db
 * @property int $open_database
 * @property string $cpu_class
 * @property string $navigator_platform
 * @property string $do_not_track
 * @property string $regular_plugins
 * @property string $canvas
 * @property string $webgl
 * @property int $adblock
 * @property int $has_lied_languages
 * @property int $has_lied_resolution
 * @property int $has_lied_os
 * @property int $has_lied_browser
 * @property string $touch_support
 * @property string $js_fonts
 *
 * @property VisitorCount $visitor
 */
class Visitor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visitor';
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
            [['time', 'site', 'block', 'user_agent', 'language', 'cpu_class', 'navigator_platform', 'do_not_track', 'touch_support', 'js_fonts'], 'required'],
            [['time', 'visitor_id', 'color_depth', 'hardware_concurrency', 'resolution_x', 'resolution_y', 'available_resolution_x', 'available_resolution_y', 'timezone_offset', 'session_storage', 'local_storage', 'indexed_db', 'open_database', 'adblock', 'has_lied_languages', 'has_lied_resolution', 'has_lied_os', 'has_lied_browser'], 'integer'],
            [['pixel_ratio'], 'number'],
            [['regular_plugins', 'canvas', 'webgl'], 'string'],
            [['site', 'block', 'user_agent', 'language', 'cpu_class', 'navigator_platform', 'do_not_track', 'touch_support', 'js_fonts'], 'string', 'max' => 255],
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
            'user_agent' => 'User Agent',
            'language' => 'Language',
            'color_depth' => 'Color Depth',
            'pixel_ratio' => 'Pixel Ratio',
            'hardware_concurrency' => 'Hardware Concurrency',
            'resolution_x' => 'Resolution X',
            'resolution_y' => 'Resolution Y',
            'available_resolution_x' => 'Available Resolution X',
            'available_resolution_y' => 'Available Resolution Y',
            'timezone_offset' => 'Timezone Offset',
            'session_storage' => 'Session Storage',
            'local_storage' => 'Local Storage',
            'indexed_db' => 'Indexed Db',
            'open_database' => 'Open Database',
            'cpu_class' => 'Cpu Class',
            'navigator_platform' => 'Navigator Platform',
            'do_not_track' => 'Do Not Track',
            'regular_plugins' => 'Regular Plugins',
            'canvas' => 'Canvas',
            'webgl' => 'Webgl',
            'adblock' => 'Adblock',
            'has_lied_languages' => 'Has Lied Languages',
            'has_lied_resolution' => 'Has Lied Resolution',
            'has_lied_os' => 'Has Lied Os',
            'has_lied_browser' => 'Has Lied Browser',
            'touch_support' => 'Touch Support',
            'js_fonts' => 'Js Fonts',
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
