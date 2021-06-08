<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

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

		$authManager->removeAll();

		// Мастер
		$master = $authManager->createRole('master');
		$authManager->add($master);
		
		$repair = $authManager->createPermission('repair');
		$repair->description = 'Чинить.';
		$authManager->add($repair);
		$authManager->addChild($master, $repair);


		// Главный инженер
		$mainMaster = $authManager->createRole('mainMaster');
		$authManager->add($mainMaster);

		$setModelApparatus = $authManager->createPermission('setModelApparatus');
		$setModelApparatus->description = 'Добавление моделей аппаратов';
		$authManager->add($setModelApparatus);
		$authManager->addChild($mainMaster, $setModelApparatus);

		$setTypeApparatus = $authManager->createPermission('setTypeApparatus');
		$setTypeApparatus->description = 'Добавление моделей аппаратов';
		$authManager->add($setTypeApparatus);
		$authManager->addChild($mainMaster, $setTypeApparatus);

		$setBrandApparatus = $authManager->createPermission('setBrandApparatus');
		$setBrandApparatus->description = 'Добавление моделей аппаратов';
		$authManager->add($setBrandApparatus);
		$authManager->addChild($mainMaster, $setBrandApparatus);


		// Администратор
		$admin = $authManager->createRole('admin');
		$authManager->add($admin);
		$authManager->addChild($admin, $mainMaster);
		
		$manageMaster = $authManager->createPermission('editRepairRecord');
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
		$authManager->assign($mainMaster, 2);
	}
}
