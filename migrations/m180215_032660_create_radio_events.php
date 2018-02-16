<?php

use yii\db\Migration;

class m180215_032660_create_radio_events extends Migration
{
    public function init()
    {
        $this->db = 'my_db';
        parent::init();
    }

    public function up()
    {
        $this->createTable(
            '{{radio_events}}',
            [
                'id' => 'pk',
                'dom_id' => 'varchar(255) NOT NULL',
            ],
            'DEFAULT CHARSET=utf8 ENGINE = INNODB'
        );


    }

    public function down()
    {
        echo "m180215_032659_create_radio_events cannot be reverted.\n";

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
