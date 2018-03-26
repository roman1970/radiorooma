<?php

use yii\db\Migration;

/**
 * Class m180325_014408_create_mod_tbls
 * Data deploy: creates data sets and data base tables
 */
class m180325_014411_create_mod_tbls extends Migration
{
    /**
     * Create database deutsch on your MySQL server
     */
    public function init()
    {
        $this->db = 'deutsch_db';
        parent::init();
    }


    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->execute(file_get_contents(__DIR__ . '/../data/deutsch_item.sql'));

        $this->createTable('deutsch_user', [
            'id' => $this->primaryKey(),
            'name' => 'VARCHAR(255) NOT NULL',
            'pseudo' => 'VARCHAR(255) NOT NULL',
            'hash' => 'VARCHAR(255) NOT NULL',
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180325_014408_create_mod_tbls cannot be reverted.\n";

        return false;
    }

}
