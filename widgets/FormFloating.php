<?php

namespace app\widgets;

use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

class FormFloating extends ActiveForm {
	function init() {
		$this->fieldConfig = ArrayHelper::merge($this->fieldConfig,
		[
			'template' => "{input}\n{label}\n{hint}\n{error}",
			'options' =>
			[
				'class' => 'form-floating py-2',
			]
		]);
		parent::init();
	}
}
