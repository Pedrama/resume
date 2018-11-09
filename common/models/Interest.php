<?php

namespace common\models;

use common\components\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%interest}}".
 *
 * @property int $id
 * @property string $Name
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $profile_id
 *
 * @property Profile $profile
 */
class Interest extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%interest}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name', ], 'required'],
//            [['Name', 'created_at', 'updated_at'], 'required'],
//            [['status', 'created_at', 'updated_at', 'profile_id'], 'integer'],
            [['Name'], 'string', 'max' => 255],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profile_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Name',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'profile_id' => 'Profile ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['id' => 'profile_id']);
    }
}
