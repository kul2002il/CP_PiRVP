<?php

namespace app\rbac\roles;

use app\rbac\support\Role;
use app\rbac\permissions as p;

class User extends Role
{
	public $description = 'Простой пользователь';
	public function children()
	{
		return [
			new p\EditOwnProfile(),
			new p\ViewOwnApparatus(),
			new p\SendFeedbackOwnRepair(),
			new p\SendMessage(),
		];
	}
}
