<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210217_112122_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->unique(),
            'role' => $this->tinyInteger(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        Yii::$app->db->createCommand()->insert('user', [
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'email' => 'admin@mail.com',
            'role' => 1,
            'status' => 10,
            'created_at' =>time()
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
