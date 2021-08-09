<?php

require 'model/data.php';

$target = 'main';

if(isset($_GET['target']))
{
	$target = $_GET['target'];
}

$target = "view/$target.php";

require 'view/layout/base.php';
