<?php

namespace common\models;

use common\components\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%award}}".
 *
 * @property int $id
 * @property string $caption
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $profile_id
 *
 * @property Profile $profile
 */
class Award extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%award}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caption', ], 'required'],
//            [['caption', 'created_at', 'updated_at'], 'required'],
//            [['status', 'created_at', 'updated_at', 'profile_id'], 'integer'],
            [['caption'], 'string', 'max' => 255],
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
            'caption' => 'Caption',
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
