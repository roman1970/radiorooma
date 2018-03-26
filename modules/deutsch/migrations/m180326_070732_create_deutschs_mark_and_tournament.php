<?php

use yii\db\Migration;

/**
 * Class m180326_070732_create_deutschs_mark_and_tournament
 */
class m180326_070732_create_deutschs_mark_and_tournament extends Migration
{

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
        $this->createTable('deutsch_mark', [
            'id' => $this->primaryKey(),
            'user_id' =>  'INT(8) NOT NULL',
            'word_id' =>  'INT(8) NOT NULL',
            'time' => 'INT(12) NOT NULL',
            'mark' =>  'INT(8) NOT NULL',
        ], 'DEFAULT CHARSET=utf8 ENGINE = INNODB'
        );

        $this->createTable('deutsch_tournament', [
            'id' => $this->primaryKey(),
            'user_id' =>  'INT(8) NOT NULL',
            'mark' =>  'INT(8) NOT NULL',
            'time' => 'INT(12) NOT NULL',
        ], 'DEFAULT CHARSET=utf8 ENGINE = INNODB'
        );

        $this->createIndex("ux_deutsch_mark_user_id", 'deutsch_mark', "user_id", false);
        $this->createIndex("ux_deutsch_mark_word_id", 'deutsch_mark', "word_id", false);
        $this->createIndex("ux_deutsch_tournament_user_id", 'deutsch_tournament', "user_id", false);

        $this->db->createCommand('ALTER TABLE {{deutsch_mark}} ADD FOREIGN KEY (`user_id`) REFERENCES {{deutsch_user}} (`id`) ON DELETE CASCADE ON UPDATE NO ACTION ;')->execute();
        $this->db->createCommand('ALTER TABLE {{deutsch_mark}} ADD FOREIGN KEY (`word_id`) REFERENCES {{deutsch_item}} (`id`) ON DELETE CASCADE ON UPDATE NO ACTION ;')->execute();
        $this->db->createCommand('ALTER TABLE {{deutsch_tournament}} ADD FOREIGN KEY (`user_id`) REFERENCES {{deutsch_user}} (`id`) ON DELETE CASCADE ON UPDATE NO ACTION ;')->execute();


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180326_070732_create_deutschs_mark_and_tournament cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180326_070732_create_deutschs_mark_and_tournament cannot be reverted.\n";

        return false;
    }
    */
}
