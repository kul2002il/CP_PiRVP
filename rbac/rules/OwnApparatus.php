<?php

namespace app\rbac\rules;

use app\rbac\support\Rule;
use app\models\Apparatus;

class OwnApparatus extends Rule
{
	public function check($user, $item, $params)
	{
		$apparatus = $params['apparatus'];
		if(!$apparatus)
		{
			if(!$params['id'])
			{
				return false;
			}
			$apparatus = Apparatus::findOne(['id' => $params['id']]);
			if(!$apparatus)
			{
				return false;
			}
		}
		return $apparatus->idOwner === \Yii::$app->user->id;
	}
}
