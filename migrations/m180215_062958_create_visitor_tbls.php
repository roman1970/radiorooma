<?php

use yii\db\Migration;

class m180215_062958_create_visitor_tbls extends Migration
{
    public function init()
    {
        $this->db = 'my_db';
        parent::init();
    }

    public function up()
    {
        $this->createTable(
            '{{visitor}}', [
            'id' => $this->primaryKey(),
            'time' => 'INT(12) NOT NULL',
            'hash' => 'VARCHAR(255) NOT NULL',
            'site' => 'VARCHAR(255) NOT NULL',
            'block' => 'VARCHAR(255) NOT NULL',
            'user_agent' => 'VARCHAR(255) NOT NULL',
            'language' => 'VARCHAR(255) NOT NULL',
            'color_depth' => 'INT(4) DEFAULT 0',
            'pixel_ratio' => 'INT(4) DEFAULT 0',
            'hardware_concurrency' => 'INT(4) DEFAULT 0',
            'resolution_x' => 'INT(4) DEFAULT 0',
            'resolution_y' => 'INT(4) DEFAULT 0',
            'available_resolution_x' => 'INT(4) DEFAULT 0',
            'available_resolution_y' => 'INT(4) DEFAULT 0',
            'timezone_offset' => 'INT(4) DEFAULT 0',
            'session_storage' => 'INT(4) DEFAULT 0',
            'local_storage' => 'INT(4) DEFAULT 0',
            'indexed_db' => 'INT(4) DEFAULT 0',
            'open_database' => 'INT(4) DEFAULT 0',
            'cpu_class' => 'VARCHAR(255) NOT NULL',
            'navigator_platform' => 'VARCHAR(255) NOT NULL',
            'do_not_track' => 'VARCHAR(255) NOT NULL',
            'regular_plugins' => 'TEXT',
            'canvas' => 'VARCHAR(255) NOT NULL',
            'webgl' => 'VARCHAR(255) NOT NULL',
            'adblock' => 'INT(1) DEFAULT 0',
            'has_lied_languages' => 'INT(1) DEFAULT 0',
            'has_lied_resolution' => 'INT(1) DEFAULT 0',
            'has_lied_os' => 'INT(1) DEFAULT 0',
            'has_lied_browser' => 'INT(1) DEFAULT 0',
            'touch_support' => 'VARCHAR(255) NOT NULL',
            'js_fonts' => 'VARCHAR(255) NOT NULL',
        ], 'DEFAULT CHARSET=utf8 ENGINE = INNODB'
        );

        $this->createTable(
            '{{visitor_count}}', [
            'id' => $this->primaryKey(),
            'hash' => 'VARCHAR(255) NOT NULL',
            'count' => 'INT(12) DEFAULT 0',
        ], 'DEFAULT CHARSET=utf8 ENGINE = INNODB'
        );


        $this->db->createCommand("ALTER TABLE {{visitor}} MODIFY COLUMN {{pixel_ratio}}  DECIMAL(10,4)  DEFAULT 0")->execute();
        $this->db->createCommand("ALTER TABLE {{visitor}} MODIFY COLUMN {{canvas}} TEXT")->execute();
        $this->db->createCommand("ALTER TABLE {{visitor}} MODIFY COLUMN {{webgl}} TEXT")->execute();
        $this->db->createCommand("ALTER TABLE {{visitor}} CHANGE {{hash}} {{visitor_id}} INTEGER(8);")->execute();

        $this->createIndex("ux_visitor_visitor_id", 'visitor', "visitor_id", false);
        $this->db->createCommand('ALTER TABLE {{visitor}} ADD FOREIGN KEY (`visitor_id`) REFERENCES {{visitor_count}} (`id`) ON DELETE CASCADE ON UPDATE NO ACTION ;')->execute();

        $this->createIndex("ux_visitor_count_hash", 'visitor_count', "hash", false);
        $this->db->createCommand('ALTER TABLE {{visitor_count}} ADD UNIQUE INDEX `ix_hash` (hash);')->execute();

        $this->createTable(
            '{{visit_error}}', [
            'id' => $this->primaryKey(),
            'time' => 'INT(12) NOT NULL',
            'text' => 'VARCHAR(255) NOT NULL',
        ], 'DEFAULT CHARSET=utf8 ENGINE = INNODB'
        );

        $this->createTable(
            '{{visit_block}}', [
            'id' => $this->primaryKey(),
            'time' => 'INT(12) NOT NULL',
            'visitor_id' => 'INT(8) NOT NULL',
            'site' => 'VARCHAR(255) NOT NULL',
            'block' => 'VARCHAR(255) NOT NULL',
        ], 'DEFAULT CHARSET=utf8 ENGINE = INNODB'
        );


        $this->createIndex("ux_visit_block_visitor_id", 'visit_block', "visitor_id", false);
        $this->db->createCommand('ALTER TABLE {{visit_block}} ADD FOREIGN KEY (`visitor_id`) REFERENCES {{visitor_count}} (`id`) ON DELETE CASCADE ON UPDATE NO ACTION ;')->execute();


        $this->addColumn('{{visit_block}}', 'ip', 'VARCHAR(225) NOT NULL');
        $this->addColumn('{{visit_block}}', 'hostname', 'VARCHAR(225) NOT NULL');
        $this->addColumn('{{visit_block}}', 'city', 'VARCHAR(225) NOT NULL');
        $this->addColumn('{{visit_block}}', 'region', 'VARCHAR(225) NOT NULL');
        $this->addColumn('{{visit_block}}', 'country', 'VARCHAR(225) NOT NULL');
        $this->addColumn('{{visit_block}}', 'loc', 'VARCHAR(225) NOT NULL');
        $this->addColumn('{{visit_block}}', 'org', 'VARCHAR(225) NOT NULL');
        $this->addColumn('{{visit_block}}', 'postal', 'VARCHAR(225) NOT NULL');



    }

    public function down()
    {
        echo "m180215_062958_create_visitor_tbls cannot be reverted.\n";

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
