<?php

$types = [
	['name' => 'Сварочный аппарат',],
	['name' => 'Холодильник',],
	['name' => 'ТНВД',],
	['name' => 'Генератор',],
];

$brands = [
	['name' => 'Ресанта',],
	['name' => 'NEON',],
	['name' => 'Бирюса',],
	['name' => 'ТЕК',],
	['name' => 'Сварнов',],
];

$models = [
	[
		'type' => 0,
		'brand' => 0,
		'name' => '220',
	],
	[
		'type' => 0,
		'brand' => 0,
		'name' => '150',
	],
	[
		'type' => 1,
		'brand' => 2,
		'name' => 'ХШ-15',
	],
];

$apparatuses = [
	[
		'image' => 'static/img/noimg.svg',
		'model' => 0,
		'idOwner' => 1,
		'status' => 'На рассмотрении',
	],
	[
		'image' => 'static/img/noimg.svg',
		'model' => 2,
		'idOwner' => 1,
		'status' => 'На ремонте',
	],
	[
		'image' => 'static/img/noimg.svg',
		'model' => 1,
		'idOwner' => 2,
		'status' => 'Ожидает диагностики',
	],
	[
		'image' => 'static/img/noimg.svg',
		'model' => 1,
		'idOwner' => 2,
		'status' => 'В работе',
	],
];

$histori = [
	[
		'apparatus' => 0,
		'datetime' => '14:05 08.08.2021',
		'context' => '/status: Ожидает рассмотрения.',
		'sender' => 0,
	],
	[
		'apparatus' => 0,
		'datetime' => '14:05 08.08.2021',
		'context' => '/status: Принят',
		'sender' => 0,
	],
	[
		'apparatus' => 0,
		'datetime' => '14:05 08.08.2021',
		'context' => '/status: Ожидает диагностики',
		'sender' => 0,
	],
	[
		'apparatus' => 0,
		'datetime' => '14:05 08.08.2021',
		'context' => 'Аппарат принят на диагностику. Вы можете привезти его в один из наших сервисных центров или вызвать мастера.',
		'sender' => 0,
	],
	[
		'apparatus' => 0,
		'datetime' => '14:05 08.08.2021',
		'context' => 'Привезу во вторник.',
		'sender' => 42,
	],
	[
		'apparatus' => 0,
		'datetime' => '14:05 08.08.2021',
		'context' => 'Хорошо.',
		'sender' => 0,
	],
	[
		'apparatus' => 0,
		'datetime' => '14:05 08.08.2021',
		'context' => 'После некоторых возникших обстоятельств я вынужден сообщить, что аппарат прибудет к вам в среду. У вас есть возможность его принять в этот день?',
		'sender' => 42,
	],
	[
		'apparatus' => 0,
		'datetime' => '14:05 08.08.2021',
		'context' => 'Да, сервисный центр работает в этот день.',
		'sender' => 0,
	],
];

foreach ($apparatuses as $key => $app)
{
	$apparatuses[$key]['model'] = $models[$app['model']];
	$apparatuses[$key]['model']['type'] = $types[$apparatuses[$key]['model']['type']];
	$apparatuses[$key]['model']['brand'] = $brands[$apparatuses[$key]['model']['brand']];

	$apparatuses[$key]['hist'] = [
		$histori[0],
		$histori[1],
		$histori[2],
		$histori[3],
		$histori[4],
	];
}

$apparatus = $apparatuses[0];
