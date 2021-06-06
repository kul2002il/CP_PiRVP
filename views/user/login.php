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
	<a class="btn btn-success" href="<?= Url::to(['/user/register']) ?>">Регистрация</a>
	<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
