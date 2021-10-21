<?php

namespace app\rbac\roles;

use app\rbac\support\Role;
use app\rbac\roles as r;

class Superuser extends Role
{
	public $description = 'Царь сея приложения';
	public function children()
	{
		return [
			new r\Admin(),
			new r\Master(),
			new r\Manager(),
		];
	}
}