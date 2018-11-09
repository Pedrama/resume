<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Programicon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programicon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iconName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>


    <?= $form->field($model, 'profile_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
