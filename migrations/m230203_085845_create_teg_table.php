<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%teg}}`.
 */
class m230203_085845_create_teg_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teg}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%teg}}');
    }
}
