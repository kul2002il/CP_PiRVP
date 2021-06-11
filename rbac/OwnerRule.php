<?php

namespace app\rbac;

use yii\rbac\Rule;

/**
 * Проверяем authorID на соответствие с пользователем, переданным через параметры
 */
class OwnerRule extends Rule
{
	public $name = 'isOwner';

	public function __construct($config = [])
	{
		parent::__construct($config);

		$time = date('Y-m-d H:i:s');
		$log = $time . " - Создание класса\n";
		file_put_contents('myLog.txt', $log, FILE_APPEND);
	}


	/**
	 * @param string|int $user the user ID.
	 * @param Item $item the role or permission that this rule is associated width.
	 * @param array $params parameters passed to ManagerInterface::checkAccess().
	 * @return bool a value indicating whether the rule permits the role or permission it is associated with.
	 */
	public function execute($user, $item, $params)
	{
		$time = date('Y-m-d H:i:s');
		$log = $time . " - проверка разрешения\n";
		file_put_contents('myLog.txt', $log, FILE_APPEND);

		return isset($params['apparatus']) ?
			$params['apparatus']->idOwner == $user :
			false;
	}
}
