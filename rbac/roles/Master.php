<?php

namespace app\rbac\roles;

use app\rbac\support\Role;
use app\rbac\permissions as p;

class Master extends Role
{
	public $description = 'Главный администратор';
	public function children()
	{
		return [
			new p\AddNews(),
			new p\EditNews(),
			new p\DeleteNews(),
		];
	}
}