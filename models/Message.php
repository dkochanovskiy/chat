<?php

namespace app\models;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $text
 * @property int|null $isIncorrect
 * @property string|null $create
 * @property string|null $update
 *
 * @property User $user
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'isIncorrect'], 'integer'],
            [['create', 'update'], 'safe'],
            [['text'], 'string', 'max' => 256],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'text' => 'Text',
            'isIncorrect' => 'Is Incorrect',
            'create' => 'Create',
            'update' => 'Update',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
