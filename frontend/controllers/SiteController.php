<?php

namespace frontend\controllers;

use common\models\Award;
use common\models\Education;
use common\models\Experience;
use common\models\Interest;
use common\models\profile;
use common\models\Programicon;
use common\models\Workflow;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new ContactForm();
        $modelProfile = profile::find()->one();
        //**********************************
        $modelExperience = Experience::find()->where(['profile_id' => $modelProfile->id])->all();
        $modelEducation = Education::find()->where(['profile_id' => $modelProfile->id])->all();
        $modelWorkflow = Workflow::find()->where(['profile_id' => $modelProfile->id])->all();
        $modelProgramIcon = Programicon::find()->where(['profile_id' => $modelProfile->id])->all();
        $modelInterest = Interest::find()->where(['profile_id' => $modelProfile->id])->all();
        $modelAward = Award::find()->where(['profile_id' => $modelProfile->id])->all();
//        echo "<pre>";
//        print_r($modelProgramIcon);
//        die();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->subject = "email from : ".$model->email." subject: " . $model->subject;

            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {

                Yii::$app->session->setFlash('success', 'با تشکر از پیامی که ارسال نمودید ، در اسرع وقت با شما تماس خواهم گرفت .');
            } else {
                Yii::$app->session->setFlash('error', 'در هنگام ارسال پیام شما خطایی رخ داده است .');
            }

            return $this->refresh();
        } else {


            return $this->render('index', [

                'modelProfile' => $modelProfile,
                'modelExperience' => $modelExperience,
                'modelEducation' => $modelEducation,
                'modelWorkflow' => $modelWorkflow,
                'modelProgramIcon' => $modelProgramIcon,
                'modelInterest' => $modelInterest,
                'modelAward' => $modelAward,
                'modelContact' => $model,
            ]);
        }


    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
