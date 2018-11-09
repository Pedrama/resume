<?php

namespace backend\controllers;

use Yii;
use common\models\profile;
use common\models\search\profileSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProfileController implements the CRUD actions for profile model.
 */
class ProfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'create',
                            'view',
                            'index',
                            'update',
                            'delete',
                            'imageadd',

                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new profileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single profile model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new profile();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $fileName = $model->imageName;
        if (is_file('@imagesRoot' . '/' . $fileName)) {
            die("dasdas");
            unlink('@imagesRoot' . '/' . $fileName);
        }
        if ($this->findModel($id)->delete()) {
            if (is_file('@imagesRoot' . '/' . $fileName)) {
                die("dasdas");
                unlink('@imagesRoot' . '/' . $fileName);
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = profile::findOne($id)) !== null) {
            return $model;
        } else {

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionImageadd()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new Profile();
        $file = UploadedFile::getInstance($model, 'image_tmp_name');
        if (empty($file)) {
            $model->addError('imageName', Yii::t('app', 'فایل یافت نشد'));

            Yii::$app->end();
        }

        $extArray = explode('.', $file->name);
        $ext = strtolower(end($extArray));
        if (!in_array($ext, Profile::$validExtImageUpload) || $file->size > Profile::$maxUploadImageSize) {
            $model->addError('imageName', Yii::t('app', 'فایل مجاز نیست'));
            return [
                'response' => false,
                'extra' => [
                    'error' => 'فرمت فایل مجاز نمی باشد',
                ]
            ];
            Yii::$app->end();
        }
        $fileName = time() . '-' . $file->name;
        $path = Yii::getAlias('@imagesRoot') . '/' . $fileName;
        if ($file->saveAs($path)) {
            return [
                'response' => true,
                'extra' => [
                    'fileName' => $fileName,
                ]
            ];
        }

        return false;
    }

}
