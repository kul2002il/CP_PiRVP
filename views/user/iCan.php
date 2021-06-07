<?php

use yii\helpers\Html;
use yii\helpers\Url;

$rules = [
	'repair' =>
	[
	],
	'setModelApparatus' =>
	[
		'/model' => 'Управление моделями аппаратов.',
	],
	'setTypeApparatus' =>
	[
	],
	'setBrandApparatus' =>
	[
	],
	'manageMaster' =>
	[
	],
	'setRole' =>
	[
		'/user/all' => 'Управление пользователями.'
	],
];

$actions = [];
foreach ($rules as $rule => $pages)
{
	if(Yii::$app->user->can($rule))
	{
		$actions = array_merge($actions, $pages);
	}
}


foreach ($actions as $act => $description) { ?>

	<p>
		<a class="btn btn-success" href="<?= Url::to([$act]); ?>">
			<?= $description ?>
		</a>
	</p>

<?php } ?>
