<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Модели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Create Model', ['create'], ['class' => 'btn btn-success']) ?>
	</p>


	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			[
				'header' => 'Тип',
				'content' => function ($model, $key, $index, $column)
				{
					return $model->getIdType0()->one()->name;
				}
			],
			[
				'header' => 'Производитель',
				'content' => function ($model, $key, $index, $column)
				{
					return $model->getIdBrand0()->one()->name;
			}
			],
			'name',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>


</div>
