<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';
?>
<?php $form = ActiveForm::begin();

echo $form->field($model, 'nameLast');
echo $form->field($model, 'nameFirst');
echo $form->field($model, 'nameMiddle');
echo $form->field($model, 'email');
echo $form->field($model, 'password')->passwordInput(['maxlength' => true]);
echo $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]);
?>


	<div class="form-group">
		<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
	</div>

<?php ActiveForm::end(); ?>