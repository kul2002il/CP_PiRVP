<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TypeApparatus;
use app\models\Brand;

/* @var $this yii\web\View */
/* @var $model app\models\Model */
/* @var $form yii\widgets\ActiveForm */

$types = TypeApparatus::find()->all();
$types = ArrayHelper::map($types, 'id', 'name');

$brand = Brand::find()->all();
$brand = ArrayHelper::map($brand, 'id', 'name');

?>

<div class="model-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'idType')
		->dropDownList($types, ['prompt' => 'Выберете'])
		->label('Тип аппарата')
	?>

	<?= $form->field($model, 'idBrand')
		->dropDownList($brand, ['prompt' => 'Выберете'])
		->label('Производитель')
	?>

	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	<div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>
	
	
	
	<h2>Новый тип аппарата</h2>
	<?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($addict['type'], 'name')->textInput(['maxlength' => true]) ?>

	<div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>
	
	
	
	<h2>Новый производитель</h2>
	<?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($addict['brand'], 'name')->textInput(['maxlength' => true]) ?>

	<div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>

</div>
