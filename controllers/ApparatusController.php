<?php

namespace app\controllers;

use Yii;
use app\models\Apparatus;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ApparatusController implements the CRUD actions for Apparatus model.
 */
class ApparatusController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::class,
				'rules' => [
					[
						'allow' => true,
						'actions' => ['new', 'view',],
						'roles' => ['@'],
					],
					[
						'allow' => true,
						'roles' => ['editRepairRecord', 'editApparatus'],
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
	 * Creates a new Apparatus model.
	 * @return mixed
	 */
	public function actionNew()
	{
		$model = new Apparatus();

		$model->idOwner = Yii::$app->user->id;

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['/user/index', 'id' => $model->id]);
		}

		return $this->render('new', [
			'model' => $model,
		]);
	}

	/**
	 * Lists all Apparatus models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => Apparatus::find(),
		]);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Apparatus model.
	 * @param integer $id
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
	 * Creates a new Apparatus model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Apparatus();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		}

		return $this->render('create', [
			'model' => $model,
		]);
	}

	/**
	 * Updates an existing Apparatus model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
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
	 * Deletes an existing Apparatus model.
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
	 * Finds the Apparatus model based on its primary key value.
	 * @param integer $id
	 * @return Apparatus the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Apparatus::findOne($id)) === null) {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
		if ( !(Yii::$app->user->can('editApparatus', ['apparatus' => $model])))
		{
			throw new ForbiddenHttpException('You are not allowed to perform this action.');
		}
		return $model;
	}
}