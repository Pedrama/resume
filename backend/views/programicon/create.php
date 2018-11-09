<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Programicon */

$this->title = 'Create Programicon';
$this->params['breadcrumbs'][] = ['label' => 'Programicons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programicon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
