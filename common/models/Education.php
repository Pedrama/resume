<?php

namespace common\models;

use common\components\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%education}}".
 *
 * @property int $id
 * @property string $university
 * @property string $major
 * @property string $grade
 * @property string $startDate
 * @property string $endDate
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $profile_id
 *
 * @property Profile $profile
 */
class Education extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%education}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['university', 'startDate', 'profile_id' ], 'required'],
            [['startDate', 'endDate'], 'safe'],
//            [['status', 'created_at', 'updated_at', 'profile_id'], 'integer'],
            [['university', 'major', 'grade'], 'string', 'max' => 255],
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
            'university' => 'نام آموزشگاه',
            'major' => 'رشته',
            'grade' => 'مقطع',
            'startDate' => 'شروع دوره',
            'endDate' => 'پایان دوره',
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
