<?php

namespace common\models;

use common\components\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%experience}}".
 *
 * @property int $id
 * @property string $Name
 * @property string ScompanyName
 * @property string $caption
 * @property string $startDate
 * @property string $endDate
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $profile_id
 *
 * @property Profile $profile
 */
class Experience extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%experience}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name', 'startDate'], 'required'],
            [['startDate', 'endDate'], 'safe'],
//            [['status', 'created_at', 'updated_at', 'profile_id'], 'integer'],
            [['Name', 'caption','companyName'], 'string', 'max' => 255],
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
            'Name' => 'سمت',
            'companyName' => 'محل فعالیت',
            'caption' => 'شرح',
            'startDate' => 'شروع فعالیت',
            'endDate' => 'پابان نعالیت',
            'status' => 'وضعیت',
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
