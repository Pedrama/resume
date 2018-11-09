<?php

/* @var $this \yii\web\View */

/* @var $content string */

use kartik\alert\AlertBlock;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="keywords"
          content="yii2,yii,YII,YII2,learning,learn,آموزش,برنامه نویسی , طراحی وب سایت ،وب , سایت , برنامه ریزی, اچ تی ام ال , سی اس اس, جاوا اسکریپت , جی کوئری, پدرام , آقایی, آقائی , درسا پلاستیک , پلاستیک ,کامپیوتر , html,css, jacascripts,jquery,git, github,pedram,pedrama,pedramaghaei,aghaei,رزومه, آماده کار , php, yii2,c#,asp,alborz,karaj,کرج,sql,sqlserver,web,webdesign,design,programmer,programer,zoop">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="Pedram Aghaei webdesign html and css, پدرام آقایی مهندس نرم افزار طراح و برنامه نویس وب آماده همکاری به صورت پاره وقت و پروژه ای می باشد, pedram aghaei developer at getzoop.com zoop dorsaplastic iranian, Pedram Aghaei developer  at php Yii and Yii2 and asp.net mvc ">
    <meta name="author" content="Pedram Aghaei - پدرام آقایی">

    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
          rel="stylesheet">
    <link rel="icon" href="/images/icon.gif" type="image/gif" sizes="16x16" >
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="page-top">
<?php $this->beginBody() ?>

<?= $content ?>
<div>


</div>
<?php $this->endBody() ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111328131-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-111328131-1');
//    $(document).ready(function () {
//        $(this).scrollTop(0);
//    });
</script>

</body>
</html>
<?php $this->endPage() ?>
