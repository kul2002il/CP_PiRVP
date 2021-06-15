<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Apparatus */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apparatuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$canEditFlag = false;
$wigetAttributes = [
	'idModel0.idType0.name',
	'idModel0.idBrand0.name',
	'idModel0.name',
];
if(Yii::$app->user->can('editApparatus'))
{
	$canEditFlag = true;
	$wigetAttributes = array_merge($wigetAttributes, [
		'id',
		'idOwner0.email',
	]);
}

?>
<div class="apparatus-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Отправить заявку', ['/repair/new', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= $canEditFlag ? Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) : '' ?>
		<?= Html::a('Delete', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post',
			],
		]) ?>
	</p>

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => $wigetAttributes,
	]) ?>

</div>
