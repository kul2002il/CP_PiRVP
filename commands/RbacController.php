<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\Permission;

/*
Для применения:
yii migrate --migrationPath=@yii/rbac/migrations
yii rbac/init
*/


class RbacController extends Controller
{
	public function actionInit()
	{
		$authManager = Yii::$app->authManager;
		(new Permission())->initRBAC();
	}
}
