<?php

namespace app\controllers;

use yii\web\NotFoundHttpException;
use Yii;
use app\models\Apparatus;
use yii\data\Pagination;

class ApparatusController extends \yii\web\Controller
{
	public function actionRequest()
	{
		return $this->render('request');
	}
	public function actionIndex()
	{
		$id = Yii::$app->request->get('id');
		if(!$id)
		{
			return $this->redirect('/user/personal-area');
		}

		$apparatus = Apparatus::find([
			'idOwner' => Yii::$app->user->id,
			'id' => $id,
		])->one();
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
		]);
	}
}
