<?php

namespace tests\unit\models;

use PHPUnit\Framework\TestCase;
use app\models\Role;

class RoleTest extends TestCase
{
	public function testAdminCode()
	{
		$role = Role::findOne(['code' => 'admin']);
		$this->assertNotEmpty($role);
		return $role;
	}

	public function testSuperuser()
	{
		$role = $this->testAdminCode();
		$user = $role->getUsers()->where(['email' => 'kul.2002.il@gmail.com']);
		$this->assertNotEmpty($user);
	}
}

