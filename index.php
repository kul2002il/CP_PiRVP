<?php

$target = 'main';

if(isset($_GET['target']))
{
	$target = $_GET['target'];
}

require 'model/data.php';
require 'model/user.php';

$target = "view/$target.php";

require 'view/layout/base.php';
