<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Вход';
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

<div class="form-group">
	<a class="btn btn-primary" href="<?= Url::to(['/user/register']) ?>">Регистрация</a>
	<?= Html::submitButton('Войти', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
