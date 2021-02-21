<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210217_112122_create_user_and_message_table extends Migration
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
            'created_at' => time(),
            'updated_at' => time(),
        ])->execute();

        Yii::$app->db->createCommand()->insert('user', [
            'username' => 'user',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'email' => 'user@mail.com',
            'role' => 2,
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ])->execute();

        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'text' => $this->text(),
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

        Yii::$app->db->createCommand()->insert('message', [
            'user_id' => 1,
            'text' => 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and
                demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the 
                pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty
                through weakness of will, which is the same as saying through shrinking from toil and pain.',
            'isIncorrect' => 0,
            'create' => date("Y-m-d H:i:s"),
            'update' => date("Y-m-d H:i:s"),
        ])->execute();

        Yii::$app->db->createCommand()->insert('message', [
            'user_id' => 2,
            'text' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum 
            deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, 
            similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem
             rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque 
             nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor 
             repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut 
             et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente 
             delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores 
             repellat.',
            'isIncorrect' => 0,
            'create' => date("Y-m-d H:i:s"),
            'update' => date("Y-m-d H:i:s"),
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%message}}');
    }
}
