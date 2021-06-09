<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Model;

/* @var $this yii\web\View */
/* @var $model app\models\Apparatus */

$this->title = 'Create Apparatus';
$this->params['breadcrumbs'][] = ['label' => 'Apparatuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$models = Model::find()->all();
$models = ArrayHelper::map($models, 'id', 'name');
?>
<div class="apparatus-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'idModel')
		->dropDownList($models, ['prompt' => 'Выберете'])
		->label('Модель')
	?>

	<div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
