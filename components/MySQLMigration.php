<?php

namespace app\components;

use yii\db\Migration;

class MySQLMigration extends Migration{
    public function init()
    {
        $this->db = 'db2';
        parent::init();
    }
}