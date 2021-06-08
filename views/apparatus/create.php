<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apparatus */

$this->title = 'Create Apparatus';
$this->params['breadcrumbs'][] = ['label' => 'Apparatuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apparatus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
