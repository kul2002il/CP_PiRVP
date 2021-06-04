<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Вход';
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

<div class="form-group">
	<a class="btn btn-success" href="http://localhost:8080/web/index.php?r=user%2Fregister">Регистрация</a>
	<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
