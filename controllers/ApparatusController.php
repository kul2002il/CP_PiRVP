<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use app\models\Apparatus;
use yii\data\Pagination;
use yii\filters\AccessControl;
use app\models\Message;
use app\models\Repair;
use app\models\File;
use yii\helpers\Url;

class ApparatusController extends \yii\web\Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' =>
				[
					[
						'actions' => [],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
		];
	}

	public function actionIndex()
	{
		$id = Yii::$app->request->get('id');
		if(!$id)
		{
			return $this->redirect(Url::toRoute('/user/personal-area'));
		}

		$apparatus = Apparatus::findOne([
			'id' => $id,
			'idOwner' => Yii::$app->user->id,
		]);
		if(!$apparatus)
		{
			throw new NotFoundHttpException(
				"Данного аппарата нет в Вашем списке");
		}

		$repair = Yii::$app->request->get('repair');
		if(is_numeric($repair))
		{
			$repair = $apparatus->getRepairs()->where(['id' => $repair])->one();
		}
		else
		{
			$repair = $apparatus->lastRepair;
		}
		if(!$repair)
		{
			throw new NotFoundHttpException("Заявка не найдена");
		}

		$messageForm = new Message();
		$data = Yii::$app->request->post();
		if($data)
		{
			$messageForm->load($data);
			//$messageForm->content = $data;
			$messageForm->idSender = Yii::$app->user->id;
			$messageForm->idRepair = $repair->id;
			
			if(!$messageForm->save())
			{
				foreach ($messageForm->errors as $value) {
					Yii::$app->session->addFlash('error', $value);
				}
			}
			else{
				Yii::$app->session->addFlash('success', 'Успешно.');
			}
		}

		$messages = $repair->getMessages();
		
		$pagination = new Pagination([
			'defaultPageSize' => 30,
			'totalCount' => $messages->count(),
		]);

		$messages = $messages
			->offset($pagination->offset)
			->limit($pagination->limit)
			->all();

		return $this->render('apparatus', [
			'apparatus' => $apparatus,
			'repair' => $repair,
			'messages' => $messages,
			'pagination' => $pagination,
			'messageForm' => $messageForm,
		]);
	}

	public function actionRequest()
	{
		$apparatus = new Apparatus();
		$repair = new Repair();
		$file = new File();
		if(Yii::$app->request->isPost)
		{
			$repair = Repair::createRequest(Yii::$app->request->post());
			if($repair->idApparatus0)
			{
				$apparatus = $repair->idApparatus0;
				$file = $apparatus->idFile0;
			}
			if(!$repair->errors)
			{
				return $this->redirect(Url::toRoute([
					'/apparatus',
					'id' => $apparatus->id,
					'repair' => $repair->id,
				]));
			}
		}
		
		
		/*
		if(Yii::$app->request->isPost)
		{
			$idApparatus = Yii::$app->request->post('apparatus');
			if($idApparatus)
			{
				Yii::debug("Аппарат id = $idApparatus");
				$apparatus = Apparatus::findOne([
					'id' => $idApparatus,
					'idOwner' => Yii::$app->user->id,
				]);
				if(!$apparatus)
				{
					throw new NotFoundHttpException("Аппарат номер $idApparatus не найден");
				}
			}
			else
			{
				$apparatus = new Apparatus([
					'idOwner' => Yii::$app->user->id,
					'idModel' => Yii::$app->request->post('model'),
					''
				]);
				if(!$apparatus->save())
				{
					foreach ($apparatus->errors as $key => $error) {
						Yii::$app->session->setFlash('error', [
							"Ошика: $key " . implode(', ', $error),
						]);
					}
					$apparatus = null;
				}
			}
		}
		if($apparatus)
		{
			$repair->load(Yii::$app->request->post());
			$repair->idApparatus = $apparatus->id;
			if($repair->save())
			{
			}
			else
			{
				foreach ($repair->errors as $key => $error) {
					Yii::$app->session->setFlash('error', [
						"Ошика: $key " . implode(', ', $error),
					]);
				}
			}
		}*/

		return $this->render('request',[
			'repair' => $repair,
			'apparatus' => $apparatus,
			'file' => $file,
		]);
	}
}
