<?php

namespace backend\controllers;

use backend\models\Floor;
use backend\models\Section;
use noIT\tips\Module;
use Yii;
use backend\models\Flat;
use backend\models\FlatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * FlatController implements the CRUD actions for Flat model.
 */
class FlatController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Flat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FlatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $sections = Section::getAllSection();
        $floors = Floor::getAllFloor();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'sections' => $sections,
            'floors' => $floors,
        ]);
    }

    /**
     * @return array
     */
    public function actionGetSelectedModelAttribute()
    {
        $this->enableCsrfValidation = false;

        Yii::$app->response->format = Response::FORMAT_JSON;

        $modelName = Yii::$app->request->post('depdrop_all_params');

        if (!empty($modelName) && isset($modelName['flat-section_id']) ) {

            $section_id = $modelName['flat-section_id'];

            $floors = Floor::find()->where(['section_id' => $section_id])->all();

            $output = [];

            foreach($floors as $floor) {
                $output[] = [
                    'id' => $floor->id,
                    'name' => $floor->name,
                ];
            }

        }

        return ['output' => $output, 'selected' => ''];
    }


    /**
     * Creates a new Flat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Flat();

        $sections = Section::getAllSection();
        $floors = Floor::getAllFloor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'sections' => $sections,
            'floors' => $floors,
        ]);
    }

    /**
     * Updates an existing Flat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->setScenario('update');

        $sections = Section::getAllSection();
        $floors = Floor::getAllFloor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'sections' => $sections,
            'floors' => $floors,
        ]);
    }

    /**
     * Deletes an existing Flat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Flat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Flat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Flat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
