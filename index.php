<?php

$target = 'main.php';

if(isset($_GET['target']))
{
	$target = $_GET['target'];
}

require 'view/layout/base.php';
