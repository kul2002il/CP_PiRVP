<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

class InitController extends Controller
{
	public function actionIndex()
	{
		echo "Init application programm.\n";
		return ExitCode::OK;
	}
	
	public function actionFill($name = 'all')
	{
		if($name === 'all')
		{
			\app\models\User::seed();
			\app\models\Type::seed();
			\app\models\Brand::seed();
		}
		else
		{
			$fullname = '\app\models\\' . $name;
			$fullname::seed();
		}
		
		echo "Готово.\n";
		return ExitCode::OK;
	}
}
