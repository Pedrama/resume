<?php

namespace common\models;

use common\components\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%profile}}".
 *
 * @property string $id
 * @property string $fName
 * @property string $lName
 * @property string $brithday
 * @property string $phone
 * @property string $email
 * @property string $city
 * @property string $province
 * @property string $bio
 * @property string $urlFacebook
 * @property string $urlTelegram
 * @property string $urlTwitter
 * @property string $urlLinkedin
 * @property string $urlInstagram
 * @property string $urlGithub
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Award[] $awards
 * @property Education[] $educations
 * @property Experience[] $experiences
 * @property Interest[] $interests
 * @property Programicon[] $programicons
 * @property Workflow[] $workflows
 */
class profile extends ActiveRecord
{
    /**
     * @inheritdoc
     *
     */

    public $image_tmp_name;
    public static $maxUploadImageSize = 5242880;
    public static $validExtImageUpload = [
        'jpg',
        'jpeg',
        'png',
    ];
    public static function tableName()
    {
        return '{{%profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fName', 'lName', 'phone', 'email'], 'required'],
            [['brithday'], 'safe'],
//            [['status', 'created_at', 'updated_at'], 'integer'],
            [['imageName','fName', 'lName', 'email', 'city', 'province', 'bio', 'urlFacebook', 'urlTelegram', 'urlTwitter', 'urlLinkedin', 'urlInstagram', 'urlGithub'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 11],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fName' => 'نام',
            'lName' => 'نام خانوادگی',
            'brithday' => 'تاریخ تولد',
            'phone' => 'شماره تلفن',
            'email' => 'پست الکترونیکی',
            'city' => 'شهر',
        'province' => 'استان',
            'bio' => 'بیوگرافی',
            'urlFacebook' => 'Url Facebook',
            'urlTelegram' => 'Url Telegram',
            'urlTwitter' => 'Url Twitter',
            'urlLinkedin' => 'Url Linkedin',
            'urlInstagram' => 'Url Instagram',
            'urlGithub' => 'Url Github',
            'status' => 'وضعیت',
            'created_at' => 'زمان ثبت',
            'updated_at' => 'زمان ویرایش',
            'imageName' => 'فایل تصویر',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAwards()
    {
        return $this->hasMany(Award::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperiences()
    {
        return $this->hasMany(Experience::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterests()
    {
        return $this->hasMany(Interest::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramicons()
    {
        return $this->hasMany(Programicon::className(), ['profile_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkflows()
    {
        return $this->hasMany(Workflow::className(), ['profile_id' => 'id']);
    }
}
