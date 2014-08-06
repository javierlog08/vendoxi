<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_detail".
 *
 * @property integer $user_id
 * @property string $name
 * @property string $secondname
 * @property string $lastname
 * @property resource $photo
 */
class UserDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'secondname', 'lastname'], 'required'],
            [['user_id'], 'integer'],
            [['photo'], 'string'],
            [['name', 'secondname', 'lastname'], 'string', 'max' => 60],
            [['user_id'], 'unique'],
            [['user_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User Id',
            'name' => 'Name',
            'secondname' => 'Secondname',
            'lastname' => 'Lastname',
            'photo' => 'Photo',
        ];
    }
}
