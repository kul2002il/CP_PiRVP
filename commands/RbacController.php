<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\rbac\Permission;

class RbacController extends Controller
{

	public function actionInit()
	{
		$auth = Yii::$app->authManager;
		// Подключение корневой роли для создания всех остальных.
		$admin = new \app\rbac\roles\Admin();
	}
}
