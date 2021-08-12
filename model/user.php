<?php

session_start();

$user = [
	'id' => 42,
	'nameFirst' => 'Алексей',
	'nameLast' => 'Рыбков',
	'nameMidle' => 'Васильевич',
	'email' => 'alex@gmail.com',
	'password' => 'qwertyui',
	'role' => 'user',
];


if(isset($_POST['login']))
{
	$_SESSION['user'] = [
		'id' => $user['id']
	];
}
else if(isset($_POST['logout']))
{
	unset($_SESSION['user']);
}

if(!isset($_SESSION['user']))
{
	$user = [];
}
