<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brithday')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urlFacebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urlTelegram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urlTwitter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urlLinkedin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urlInstagram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urlGithub')->textInput(['maxlength' => true]) ?>


    <?php
    echo FileInput::widget([
        'name' => 'profile[image_tmp_name]',
        'options' => [
            'id'=>'upload-post-pic',
            'multiple' => false
        ],
        'pluginOptions' => [
            'uploadUrl' => Url::to(['imageadd']),
        ],
        'pluginEvents'=>[
            "filebatchselected"=>"function(event,files){
                $('#upload-post-pic').fileinput('upload');
                }",
            "fileuploaded"=>"function(event,data,previewId,index){
                                var from=data.from,files=data.files,extra=data.extra,
                                response=data.response,reader=data.reader;
                                $('#'+previewId).append('<input type=\"hidden\"name=\"profile[imageName]\"value=\"'+response.extra.fileName+'\"/>');
                                $('#'+previewId+'.progress').hide();
         }",
        ]
    ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
