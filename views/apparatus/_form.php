<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Apparatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apparatus-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idModel')->textInput() ?>

    <?= $form->field($model, 'idOwner')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
