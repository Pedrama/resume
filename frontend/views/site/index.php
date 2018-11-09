<?php

use common\widgets\Alert;
use hoomanMirghasemi\jdf\Jdf;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->title = $modelProfile->fName . ' ' . $modelProfile->lName.' - Pedram Aghaei '; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">

    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none"><?= $modelProfile->fName . ' ' . $modelProfile->lName ?></span>

        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2"
               src="<?= DOMAIN ?>/images/<?= $modelProfile->imageName ?>" alt=""/>
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div style="font-family: 'IRANSans'!important;" class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">درباره من</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#experience">تجربه ها</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#education">تحصیلات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#skills">مهارت ها</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#interests">علاقه مندی</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#awards">دستارودها</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#contact">ارسال پیام</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid p-0">
    <section style="text-align: right" class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">


            <h1 class="mb-0"
                style="font-family: 'IRANSans'!important;padding-bottom: 30px;">
                <?= $modelProfile->fName ?>
                <span class="text-primary"><?= $modelProfile->lName ?> </span>
            </h1>
            <h5 style="text-align: right;font-family: 'IRANSans'!important;padding-bottom: 25px;text-align:center; ">
                  <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                </span>
                <?= $modelProfile->province ?>&nbsp&nbsp&nbsp <?= $modelProfile->city ?>
            </h5>
            <div class="subheading mb-5"><?= $modelProfile->phone ?> ·
                <a href="mailto:name@email.com"> <?= $modelProfile->email ?></a>
            </div>
            <p class="mb-5"> <?= $modelProfile->bio ?></p>
            <ul class="list-inline list-social-icons mb-0">
                <?php if ($modelProfile->urlFacebook != null): ?>
                    <li class="list-inline-item">
                        <a href="<?= $modelProfile->urlFacebook ?>">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($modelProfile->urlTwitter != null): ?>
                    <li class="list-inline-item">
                        <a href="<?= $modelProfile->urlTwitter ?>">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($modelProfile->urlLinkedin != null): ?>
                    <li class="list-inline-item">
                        <a href="<?= $modelProfile->urlLinkedin ?>">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($modelProfile->urlGithub != null): ?>
                    <li class="list-inline-item">
                        <a href="<?= $modelProfile->urlGithub ?>">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($modelProfile->urlTelegram != null): ?>
                    <li class="list-inline-item">
                        <a href="<?= $modelProfile->urlTelegram ?>">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-telegram fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($modelProfile->urlInstagram != null): ?>
                    <li class="list-inline-item">
                        <a href="<?= $modelProfile->urlInstagram ?>">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
            <h2 class="mb-5" style="font-family: IRANSans;text-align: right">تجربه ها</h2>
            <?php foreach ($modelExperience as $item): ?>
                <div style="float: right; font-family: IRANSans!important;"
                     class="resume-item d-flex flex-column flex-md-row mb-5">
                    <div style="text-align: right;float: right; font-family: IRANSans!important;"
                         class="resume-item d-flex flex-column flex-md-row mb-5">
                        <div class="resume-content mr-auto">
                            <h3 style="text-align: right; font-family: IRANSans!important;"
                                class="mb-0"><?= $item['Name'] ?></h3>
                            <div style="text-align: right; font-family: IRANSans!important;"
                                 class="subheading mb-3"><?= $item['companyName'] ?></div>
                            <h6 style="text-align: right; font-family: IRANSans!important;"><?= $item['caption'] ?></h6>
                        </div>
                    </div>

                    <div style="text-align: left; float: left;" class="resume-date text-md-right">
                        <span class="text-primary"><?= Jdf::jdate('Y/m/d', strtotime($item['startDate'])); ?>
                            الی <?= Jdf::jdate('Y/m/d', strtotime($item['endDate'])) ?></span>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </section>

    <section style="text-align: right; font-family: IRANSans!important;"
             class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="my-auto" style="text-align: right; font-family: IRANSans!important;">
            <h2 class="mb-5" style="text-align: right; font-family: IRANSans!important;">تحصیلات</h2>
            <?php foreach ($modelEducation as $item): ?>
                <div style="float: right; font-family: IRANSans!important;"
                     class="resume-item d-flex flex-column flex-md-row mb-5">
                    <div style="text-align: right; font-family: IRANSans!important;" class="resume-content mr-auto">
                        <h3 class="mb-0"
                            style="text-align: right; font-family: IRANSans!important;"><?= $item['university'] ?></h3>
                        <div class="subheading mb-3"
                             style="text-align: right; font-family: IRANSans!important;"><?= $item['grade'] ?></div>
                        <div style="text-align: right; font-family: IRANSans!important;"><?= $item['major'] ?></div>

                    </div>
                    <div style="text-align: left; float: left;" class="resume-date text-md-right">
                        <span class="text-primary">
                            <?= Jdf::jdate('Y/m/d', strtotime($item['startDate'])) ?>
                            الی
                            <?= Jdf::jdate('Y/m/d', strtotime($item['endDate'])) ?>
                       </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
            <h2 style="text-align: right; font-family: IRANSans!important;" class="mb-5">مهارت ها</h2>

            <!--            <div class="subheading mb-3">Programming Languages &amp; Tools</div>-->
            <ul style="text-align: center;" class="list-inline list-icons">
                <?php foreach ($modelProgramIcon as $item): ?>
                    <li class="list-inline-item">
                        <i class="devicons devicons-<?= $item['iconName'] ?>"></i>
                    </li>
                <?php endforeach; ?>

            </ul>

            <div style="float: right; font-family: IRANSans!important;" class="subheading mb-3">لیست مهارت ها</div>
            <br/>
            <br/>

            <ul dir="rtl" style="font-family: IRANSans!important; text-align: right; float: right;" class=" fa-ul mb-0">
                <?php foreach ($modelWorkflow as $item): ?>
                    <li>
                        <div style="text-align: right"><span class="fa fa-check"></span>
                            <i><?= $item['caption'] ?></i>

                        </div>
                        <br/>
                    </li> <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interests">
        <div class="my-auto">
            <h2 style="font-family: IRANSans!important; text-align: right; float: right;" class="mb-5 myfont">علاقه
                مندی</h2>
            <div style="height: 150px;"></div>
            <?php foreach ($modelInterest as $item): ?>

                <div style="font-family: IRANSans!important; text-align: right; "><span
                            class="fa fa-check"></span> <?= $item['Name'] ?></div>
                <br/>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="awards">

        <div style="font-family: IRANSans!important; text-align: right; float: right;" class="my-auto">
            <h2 style="font-family: IRANSans!important; text-align: right; float: right;" class="mb-5">دستاوردها و
                مدارک</h2>
            <div style="height: 150px;"></div>
            <ul style="font-family: IRANSans!important; text-align: right; float: right;" class="fa-ul mb-0">
                <?php foreach ($modelAward as $item): ?>
                    <li>
                        <span class="fa fa-trophy text-warning">&nbsp;&nbsp;</span>
                        <i style="font-family: IRANSans!important; text-align: right; ">
                            <?= $item['caption'] ?>
                        </i>
                        <br/>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </section>
    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="contact"
             style="font-family: IRANSans!important; text-align: right; ">
        <div class="my-auto">
            <h2 style="font-family: IRANSans!important; text-align: right; ">ارسال پیام</h2>
            <br/>
            <p>در صورت داشتن پرسش فرم زیر را تکمیل و ارسال نمائید . با تشکر </p>
            <br>
            <div class="row">
                <div class="col-lg-5">
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($modelContact, 'name') ?>

                    <?= $form->field($modelContact, 'email') ?>

                    <?= $form->field($modelContact, 'subject') ?>

                    <?= $form->field($modelContact, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($modelContact, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3" >{image}</div><div style="margin-right: 45px;" class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('ارسال', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </section>

</div>