<?php

namespace app\rbac\support;

class Item extends \yii\rbac\Item
{
	/*
	 * Название ролей и дочерних разрешений.
	 * (Имя класса без пространства имён.)
	 * @return \app\rbac\Role[]|\app\rbac\Permition[] Массив объектов ролей и разрешений.
	 */
	public function children(){
		return [];
	}

	public function __construct($config = [])
	{
		parent::__construct($config);
		$mathes = [];
		preg_match('/(.*)\\\\(.+?)$/', get_called_class(), $mathes);
		$this->name = $mathes[2];
		$auth = \Yii::$app->authManager;
		if(!$auth->getPermission($this->name))
		{
			$auth->add($this);
		}
		foreach ($this->children() as $child) {
			/*$child = $auth->getPermission($childName);
			if(!$child)
			{
				$child = $auth->getRole($childName);
			}
			if(!$child)
			{
				throw new \Exception("Разрешение или роль $childName не найдено.");
			}*/
			\Yii::$app->authManager->addChild($this, $child);
		}
	}
}
