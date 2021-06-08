<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Repair */

$this->title = 'Заявка на ремонт';
$this->params['breadcrumbs'][] = ['label' => 'Repairs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $form->field($model, 'brekage')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

	<div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>

</div>
