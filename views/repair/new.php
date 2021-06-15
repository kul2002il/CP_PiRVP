<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Repair */
/* @var $apparatuses array */

$this->title = 'Заявка на ремонт';
$this->params['breadcrumbs'][] = ['label' => 'Repairs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-create">

	<?php $form = ActiveForm::begin(); ?>
	<h1><?= Html::encode($this->title) ?></h1>

	<?php
	if(count($apparatuses) === 1)
	{
		$optionsField = ['disabled' => true];
	}
	else
	{
		$optionsField = ['prompt' => 'Выберете'];
	}
	echo $form->field($model, 'idApparatus')
		->dropDownList($apparatuses, $optionsField)
		->label('Аппапат');
	?>

	Ваш аппарат ещё не зарегистрирован? <a class='btn btn-primary' href="/apparatus/new">Новый аппарат</a>

	<?= $form->field($model, 'brekage')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

	<div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>
</div>
