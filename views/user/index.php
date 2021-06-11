<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Permission;
use app\models\Apparatus;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->user->identity->getUsername();
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

	<h1><?=
		Yii::$app->user->identity->nameLast . ' ' .
		Yii::$app->user->identity->nameFirst
	?></h1>
<?php
	echo '<p>'
		. Html::beginForm(['/user/logout'], 'post')
		. Html::submitButton(
		'Выйти',
		['class' => 'btn btn-submit logout']
		)
		. Html::endForm()
	. '</p>';
?>

	<div>
		<h2>Доступные действия</h2>
		<?php

		$actions = (new Permission())->getICan();

		foreach ($actions as $act => $description) { ?>

			<p>
				<a class="btn btn-primary" href="<?= Url::to([$act]); ?>">
					<?= $description ?>
				</a>
			</p>

		<?php } ?>

	</div>
	
	<div>
		<h2>Мои аппараты</h2>
		<div class="row">
		<?php foreach ($apparatus as $appar):?>
			<div class="col-lg-4">
				<h3><?= $appar->getIdModel0()->one()->name ?></h3>
				
				<p><a
					class="btn btn-default"
					href="<?=Url::to(['/apparatus/view', 'id' => $appar->id])?>"
				>Подробнее &raquo;</a></p>
			</div>
		<?php endforeach; ?>
		</div>
	</div>

</div>
