<?php

use app\migrations\BaseMigration;

class m180315_102628_init extends BaseMigration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $this->createTable('{{%gambar}}', [
            'id' => $this->primaryKey(),
            'gambar' => $this->string(255),
        ], $this->tableOptions());

        $this->createTable('{{%lorem}}', [
            'id' => $this->primaryKey(),
            'jenis_kelamin' => $this->integer(11),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->tableOptions());

        $this->addPrimaryKey('namanya ini mah gak ngaruh', '{{%table}}', columns);
    }

    public function down()
    {
        $this->dropTable('{{%gambar}}');
    }
}
