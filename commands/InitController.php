<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

use app\models\User;

class InitController extends Controller
{
	public function actionIndex()
	{
		return ExitCode::OK;
	}
	
	public function actionFillBD()
	{
		;
	}
}
