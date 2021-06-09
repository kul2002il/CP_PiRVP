<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Permission;

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

</div>
