<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Вход';
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'password') ?>

<div class="form-group">
	<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>