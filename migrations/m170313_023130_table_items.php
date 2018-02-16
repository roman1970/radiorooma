<?php

use yii\db\Migration;

class m170313_023130_table_items extends Migration
{
    public function up()
    {
       /*$this->createTable('items', [
            'id' => 'SERIAL NOT NULL PRIMARY KEY',
            'cat_id' => 'integer NOT NULL references "category"(id) on UPDATE CASCADE on DELETE CASCADE',
            'text' => 'TEXT NOT NULL',
            'tags' => 'VARCHAR(255) NOT NULL',
            'audio' => 'VARCHAR(255) NOT NULL',
            'img' => 'VARCHAR(255) NOT NULL',
            'cens' => 'integer(2) NOT NULL',
            'published' => 'integer(2) DEFAULT 1',
        ]
        );

        $this->createIndex("ux_items_cat_id", 'items', "cat_id", false);
       */


    }

    public function down()
    {
        echo "m170313_023130_table_items cannot be reverted.\n";

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
