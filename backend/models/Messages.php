<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property integer $id
 * @property string $date
 * @property integer $sender_id
 * @property integer $target_id
 * @property string $title
 * @property string $message
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%messages}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'sender_id', 'target_id', 'title', 'message'], 'required'],
            [['date'], 'safe'],
            [['sender_id', 'target_id'], 'integer'],
            [['title'], 'string', 'max' => 100],
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
            'date' => 'Date',
            'sender_id' => 'Sender Id',
            'target_id' => 'Target Id',
            'title' => 'Title',
            'message' => 'Message',
        ];
    }
}
