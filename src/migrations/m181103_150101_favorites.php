<?php

namespace thienhungho\Favorites\migrations;

use yii\db\Schema;

class m181103_150101_favorites extends \yii\db\Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%favorites}}', [
            'id'         => $this->primaryKey(),
            'obj_id'     => $this->integer(19)->notNull(),
            'obj_type'   => $this->string(255)->notNull(),
            'ip'         => $this->string(255)->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultValue(CURRENT_TIMESTAMP),
            'updated_at' => $this->timestamp()->notNull()->defaultValue('0000-00-00 00:00:00'),
            'created_by' => $this->integer(19),
            'updated_by' => $this->integer(19),
        ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%favorites}}');
    }
}
