<?php

namespace app\models;

use Yii;

class Permission
{
	
	public function getRules()
	{
		return [
			'OwnerRule',
		];
	}
	
	public function getArrayPermissions()
	{
		return [
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
			
			'editOwnerApparatus' =>
			[
				'Редактировать свои аппараты',
				'rule' => 'OwnerRule',
				'base' => ['editApparatus']
			],
	
			'setRole' =>
			[
				'Назначать роли',
				'pages' => [
					'/user/all' => 'Управление пользователями.',
				],
			],
		];
	}

	public function getArrayRoles()
	{
		return [
			'user' =>
			[
				'editOwnerApparatus'
			],
			
			'master' =>
			[
				'repair',
				'user',
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
	}

	public function initRBAC()
	{
		$authManager = Yii::$app->authManager;

		$authManager->removeAll();
		
		$roles = $this->initRoles($this->initPermissions($this->initRules()));
		
		// Назначение ролей пользователям по ID.
		$authManager->assign($roles['superuser'], 1);
		$authManager->assign($roles['mainMaster'], 2);
		$authManager->assign($roles['user'], 3);
		$authManager->assign($roles['user'], 4);

		echo "Разрешения и роли переписаны.\n";
		return $roles;
	}
	
	private function initRules()
	{
		$authManager = Yii::$app->authManager;
		
		$rules = $this->getRules();
		
		$ruleNames = [];
		foreach ($rules as $ruleClassName)
		{
			$ruleFullClassName = '\\app\\rbac\\' . $ruleClassName;
			$rule = new $ruleFullClassName;
			$authManager->add($rule);
			$ruleNames[$ruleClassName] = $rule->name;
		}
		
		return $ruleNames;
	}
	
	private function initPermissions($ruleNames)
	{
		$authManager = Yii::$app->authManager;
		$permissions = $this->getArrayPermissions();
		
		$permObjects = [];
		foreach ($permissions as $name => $properties)
		{
			$perm = $authManager->createPermission($name);
			$perm->description = $properties[0];
			if(isset($properties['rule']))
			{
				if(isset($ruleNames[$properties['rule']]))
				{
					$perm->ruleName = $ruleNames[$properties['rule']];
				}
				else
				{
					throw new \Exception("Отсутствует класс правила \"${properties['rule']}\".");
				}
			}
			$authManager->add($perm);
			if (isset($properties['base']) && isset($properties['rule']))
			{
				foreach ($properties['base'] as $base)
				{
					if(!isset($permObjects[$base]))
					{
						throw new \Exception("Отсутствует или ещё не создано разрешение \"$base\".");
					}
					$authManager->addChild($perm, $permObjects[$base]['object']);
				}
			}
			$permObjects[$name]['object'] = $perm;
		};
		
		return $permObjects;
	}
	
	private function initRoles($permissions)
	{
		$authManager = Yii::$app->authManager;
		
		$roles = $this->getArrayRoles();
		$roleObjects = [];
		
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
				else if(isset($roleObjects[$child]))
				{
					$objChild = $roleObjects[$child];
				}
				else
				{
					throw new \Exception("Отсутствует разрешение или роль \"$child\".");
				}
				$authManager->addChild($role, $objChild);
			}
			$roleObjects[$name] = $role;
		};
		return $roleObjects;
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
