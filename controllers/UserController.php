<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use app\models\LoginForm;
use app\models\User;

class UserController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['logout'],
				'rules' => [
					[
						'actions' => ['logout'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
		];
	}
	
	public function actionIndex()
	{
		return $this->render('index');
	}
	
	public function actionLogin()
	{
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		
		$model = new User();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		}
		
		$model->password = '';
		return $this->render('login', [
			'model' => $model,
		]);
	}
	
	public function actionLogout()
	{
		Yii::$app->user->logout();
		return $this->goHome();
	}
	
	public function actionPersonalArea()
	{
		return $this->render('personalarea');
	}
}





