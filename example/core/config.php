<?php

require('ezPHP/autoload.php');

ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');

$ez = new ezPHP();

$dir = dirname(dirname(__FILE__));

$ez->setDirs(array(
	'views'			=>			$dir . '/views',
	'cache'			=>			$dir . '/views/_cache',
));

$ez->setConfig(array(
	'cache_time'		=>		'10',
));

$ez->name = 'Testing Site';

//$ez->debug();

?>