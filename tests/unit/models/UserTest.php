<?php

namespace tests\unit\models;

use PHPUnit\Framework\TestCase;
use app\models\User;
use app\models\Role;

class UserTest extends TestCase
{
	public function testFindUserByUsername()
	{
		$user = User::findByUsername('kul.2002.il@gmail.com');
		$this->assertNotEmpty($user, 'Пользователь не найден.');
		$user = User::findByUsername('test@gmail.com');
		$this->assertEmpty($user, 'Найден несуществующий пользователь.');
	}

	public function testSetRoleByCode()
	{
		$user = new User();
		$this->assertNull($user->idRole, 'Присваивается роль по умолчанию');
		$user->setRoleCode('admin');
		$this->assertSame(Role::findOne(['code' => 'admin'])->id, $user->idRole, 'Роль устанавливается неверно или вовсе не устанавливается.');
	}
}
