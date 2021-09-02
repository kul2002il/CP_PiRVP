<?php

/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use app\widgets\FormFloating;
use yii\helpers\Html;

$this->title = 'Вход';
?>
<div class="mx-auto">

<div class="form-signin">
	<h2 class="h3 mb-3 fw-normal w-3">Вход</h2>
	<?php $form = FormFloating::begin(); ?>
	
	<?= $form->field($model, 'email')->textInput(['placeholder' => 'email2'])?>
	
	<?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'email2']) ?>
	
	<?= Html::submitButton('Войти', ['class' => 'w-100 btn btn-lg btn-primary']) ?>
	
	<?php FormFloating::end(); ?>
	<!--
	<form method="post">
		<h1 class="h3 mb-3 fw-normal w-3">Please sign in</h1>

		<div class="form-floating py-2">
			<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
			<label for="floatingInput">Email</label>
		</div>
		<div class="form-floating py-2">
			<input type="password" class="form-control" id="floatingPassword" placeholder="Password">
			<label for="floatingPassword">Пароль</label>
		</div>

		<input class="w-100 btn btn-lg btn-primary" type="submit" name="login" value="Войти">
	</form>
	-->
</div>

</div>


