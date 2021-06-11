<?php

use yii\helpers\Html;
use yii\helpers\Url;

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

	<?php if($iCan): ?>
	<div>
		<h2>Доступные действия</h2>
		<?php

		foreach ($iCan as $act => $description) { ?>

		<p>
			<a class="btn btn-primary" href="<?= Url::to([$act]); ?>">
				<?= $description ?>
			</a>
		</p>

		<?php } ?>

	</div>
	<?php endif; ?>
	
	<div>
		<h2>
			Мои аппараты
			<a class="btn btn-success" href="<?= Url::to('/apparatus/new'); ?>">
				Создать новый
			</a>
		</h2>

		<?php if($apparatus): ?>

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

		<?php else: ?>

		<div>
			Нет аппараратов.
		</div>

		<?php endif; ?>
	</div>

</div>
