<?php

use yii\db\Migration;

class m180215_061629_create_events_to_items extends Migration
{
    public function init()
    {
        $this->db = 'my_db';
        parent::init();
    }

    public function up()
    {

        $this->createTable('event_to_item', [
            'id' => $this->primaryKey(),
            'item_id' =>  'INT(8) NOT NULL',
            'event_id' =>  'INT(8) NOT NULL',
            'visitor_id' =>  'INT(8) NOT NULL',
            'time' => 'INT(12) NOT NULL',
        ], 'DEFAULT CHARSET=utf8 ENGINE = INNODB'
        );

        $this->createIndex("ux_event_to_item_event_id", 'event_to_item', "event_id", false);
        $this->db->createCommand('ALTER TABLE {{event_to_item}} ADD FOREIGN KEY (`event_id`) REFERENCES {{radio_events}} (`id`) ON DELETE CASCADE ON UPDATE NO ACTION ;')->execute();

    }

    public function down()
    {
        echo "m180215_061629_create_events_to_items cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
