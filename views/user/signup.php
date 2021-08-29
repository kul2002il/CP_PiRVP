<?php

/* @var $this yii\web\View */
/* @var $user app\models\User */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Регистрация';

?>
<div class="container p-4">

<h2 class="h3 mb-3 fw-normal w-3">Регистрация</h2>

<?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col">
			<?php
			echo $form->field($user, 'nameLast');
			echo $form->field($user, 'nameFirst');
			echo $form->field($user, 'nameMiddle');
			echo $form->field($user, 'email');
			echo $form->field($user, 'password')->passwordInput(['maxlength' => true]);
			echo $form->field($user, 'password_repeat')->passwordInput(['maxlength' => true]);
			?>
			<input class="btn btn-lg btn-primary" type="submit" name="signup" value="Зарегистрироваться">
		</div>
		<div class="col">
			<div class="border border-2 rounded p-2">
				Пароль
				<ul>
					<li>Должен содержать не менее восьми символов.</li>
					<li>Состоит из заглавных и прописных символов
						латинского (A-Z, a-z) алфавита.</li>
					<li>Содержит в себе цифры</li>
					<li>Содержит спецсимволы</li>
					<li>Не является последовательностью клавишь на клавиатуре (asdfghjkl).</li>
				</ul>
			</div>
		</div>
	</div>
<?php ActiveForm::end(); ?>

</div>
