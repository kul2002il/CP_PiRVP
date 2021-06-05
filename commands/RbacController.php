<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
	public function actionInit()
	{
		$authManager = Yii::$app->authManager;

		$authManager->removeAll();
		
		// Мастер
		$master = $authManager->createRole('master');
		$authManager->add($master);
		
		$repair = $authManager->createPermission('repair');
		$repair->description = 'Чинить.';
		$authManager->add($repair);
		$authManager->addChild($master, $repair);
		
		
		// Администратор
		$admin = $authManager->createRole('admin');
		$authManager->add($admin);
		$authManager->addChild($admin, $master);
		
		$manageMaster = $authManager->createPermission('manageMaster');
		$manageMaster->description = 'Управлять заданиями мастеров.';
		$authManager->add($manageMaster);
		$authManager->addChild($admin, $manageMaster);

		// Суперпользователь
		$sudo = $authManager->createRole('superuser');
		$authManager->add($sudo);
		$authManager->addChild($sudo, $admin);
		
		$setRole = $authManager->createPermission('setRole');
		$setRole->description = 'Назначать роли.';
		$authManager->add($setRole);
		$authManager->addChild($sudo, $setRole);
		

		// Назначение ролей пользователям по ID.
		$authManager->assign($sudo, 1);
	}
}
