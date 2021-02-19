<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message}}`.
 */
class m210216_135019_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'text' => $this->string(),
            'isIncorrect' => $this->tinyInteger(),
            'create' => $this->string(),
            'update' => $this->string(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk-message-user_id',
            'message',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%message}}');
    }
}
