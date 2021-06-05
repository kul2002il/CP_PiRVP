<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
	public function actionInit()
	{
		$authManager = Yii::$app->authManager;

		// добавляем разрешение
		$setRole = $authManager->createPermission('setRole');
		$setRole->description = 'Назначать роли.';
		$authManager->add($setRole);

		// добавляем роль "admin"
		$admin = $authManager->createRole('admin');
		$authManager->add($admin);

		// добавляем роль "superuser" и даём роли разрешение "setRole"
		// а также все разрешения роли "author"
		$sudo = $authManager->createRole('superuser');
		$authManager->add($sudo);
		$authManager->addChild($sudo, $setRole);
		$authManager->addChild($sudo, $admin);

		// Назначение ролей пользователям. 1 это IDs возвращаемые IdentityInterface::getId()
		// обычно реализуемый в модели User.
		$authManager->assign($sudo, 1);
	}
}
