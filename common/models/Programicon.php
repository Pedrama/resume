<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%programicon}}".
 *
 * @property int $id
 * @property string $iconName
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $profile_id
 *
 * @property Profile $profile
 */
class Programicon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%programicon}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iconName', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at', 'profile_id'], 'integer'],
            [['iconName'], 'string', 'max' => 255],
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
            'iconName' => 'Icon Name',
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
