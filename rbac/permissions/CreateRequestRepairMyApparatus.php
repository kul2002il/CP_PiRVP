<?php

namespace app\rbac\permissions;

use app\rbac\support\Permission;
use app\rbac\permissions as p;
use app\rbac\rules as rule;

class CreateRequestRepairMyApparatus extends Permission
{
	public $description = 'Отправка запроса на ремонт своего аппарата.';

	public function children()
	{
		return [
			new p\CreateRequest(),
		];
	}
	public function rule()
	{
		return new rule\OwnApparatus();
	}
}
