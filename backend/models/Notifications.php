<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "notifications".
 *
 * @property integer $id
 * @property string $time
 * @property integer $type
 * @property string $message
 * @property integer $user_id
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%notifications}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time', 'type', 'message', 'user_id'], 'required'],
            [['time'], 'safe'],
            [['type', 'user_id'], 'integer'],
            [['message'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'type' => 'Type',
            'message' => 'Message',
            'user_id' => 'User Id',
        ];
    }
}
