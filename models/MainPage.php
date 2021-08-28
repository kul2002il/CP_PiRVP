<?php

namespace app\models;

use Yii;
use yii\base\Model;

class MainPage extends Model
{
	public $banner = [
		'image' => '/media/image/work.jpeg',
	];
	public $heroes = [
		[
			'title' => 'Более 20 лет опыта',
			'text' => 'Большой опыт работы наших мастеров позволяет выполнять работу на высоком уровне.',
			'image' => '/media/image/work.jpeg',
		],
		[
			'title' => 'Слесарные работы по металлу',
			'text' => 'Выполнение слесарных работ по металлу позволяет изготавливать множество механических узлов нестандартной конструкции.',
			'image' => '/media/image/metal.jpeg',
		],
	];
}