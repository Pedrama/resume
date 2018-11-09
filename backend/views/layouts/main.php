<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
          rel="stylesheet">
    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body style="font-family: BYekan">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

//    ساختارش رو تغییر دادم و دو تا نوار نماش دادم تا بشه یکی رو چپ چین کرد دیگری راست چین

    //************************
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'ورود', 'url' => ['/site/login']];
    } else {
        $menuItems[] =  Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'خروج (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link','style'=>'text-decoration:none;padding-top:10px;']
            )
            . Html::endForm();
//            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
//        ['label' => 'خانه', 'url' => ['/site/index'],'linkOptions'=>['style'=>'float:right']],
            ['label' => 'خانه', 'url' => ['/site/index']],
//            add by pedram
            ['label' => 'درباره من', 'url' => ['/profile/index'],],
            ['label' => 'تجربه ها', 'url' => ['/experience/index']],
            ['label' => 'تحصیلات', 'url' => ['/education/index']],
            ['label' => 'آیکن مهارت ها', 'url' => ['/programicon/index']],
            ['label' => 'لیست مهارت ها', 'url' => ['/workflow/index']],
            ['label' => 'علاقه مندی ', 'url' => ['/interest/index']],
            ['label' => 'دستاوردها', 'url' => ['/award/index']],

        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuItems

        ,
    ]);
    NavBar::end();
    ?>




    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer" style="position: fixed; bottom: 0px; text-align: center">
    <div class="container">
        <p class="pull-left">&copy; Pedrama.ir <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
