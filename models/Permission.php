<?php

namespace app\models;

use Yii;

class Permission
{
	private $permissions =
	[
		'repair' =>
		[
			'Чинить',
		],

		'setModelApparatus' =>
		[
			'Добавление моделей аппаратов',
			'pages' => [
				'/model' => 'Управление моделями аппаратов.',
			]
		],

		'setTypeApparatus' =>
		[
			'Добавление моделей аппаратов',
		],

		'setBrandApparatus' =>
		[
			'Добавление моделей аппаратов',
		],

		'editRepairRecord' =>
		[
			'Управлять заданиями мастеров',
			'pages' => [
				'/repair' => 'Управление записями ремонта.',
			],
		],

		'editApparatus' =>
		[
			'Управлять аппаратами пользователей',
			'pages' => [
				'/apparatus' => 'Управление аппаратами пользователей.',
			],
		],

		'setRole' =>
		[
			'Назначать роли',
			'pages' => [
				'/user/all' => 'Управление пользователями.',
			],
		],
	];

	private $roles =
	[
		'master' =>
		[
			'repair',
		],

		'mainMaster' =>
		[
			'setModelApparatus',
			'setTypeApparatus',
			'setBrandApparatus',
			'master',
		],

		'admin' =>
		[
			'editRepairRecord',
			'editApparatus',
			'mainMaster',
		],

		'superuser' =>
		[
			'setRole',
			'admin',
		],
	];

	public function getArrayPermissions()
	{
		return $this->permissions;
	}

	public function getArrayRoles()
	{
		return $this->roles;
	}

	public function initRBAC()
	{
		$authManager = Yii::$app->authManager;

		$authManager->removeAll();

		$permissions = $this->getArrayPermissions();

		foreach ($permissions as $name => $properties)
		{
			$perm = $authManager->createPermission($name);
			$perm->description = $properties[0];
			$authManager->add($perm);
			$permissions[$name]['object'] = $perm;
		}

		$roles = $this->getArrayRoles();
		$out = [];

		foreach ($roles as $name => $childs)
		{
			$role = $authManager->createRole($name);
			$authManager->add($role);
			foreach ($childs as $child)
			{
				$objChild = null;
				if(isset($permissions[$child]))
				{
					$objChild = $permissions[$child]['object'];
				}
				else if(isset($out[$child]))
				{
					$objChild = $out[$child];
				}
				else
				{
					throw new \Exception("Отсутствует разрешение или роль \"$child\".");
				}
				$authManager->addChild($role, $objChild);
			}
			$out[$name] = $role;
		}

		// Назначение ролей пользователям по ID.
		$authManager->assign($out['superuser'], 1);
		$authManager->assign($out['mainMaster'], 2);

		echo "Разрешения и роли переписаны.";
		return $out;
	}

	public function getICan()
	{
		$rules = $this->getArrayPermissions();
		$actions = [];
		foreach ($rules as $rule => $properties)
		{
			if(Yii::$app->user->can($rule))
			{
				if(isset($properties['pages']))
				{
					$actions = array_merge($actions, $properties['pages']);
				}
			}
		}
		return $actions;
	}
}
