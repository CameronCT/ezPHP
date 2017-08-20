<?php

require('ezPHP/autoload.php');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');

$ez = new ezPHP('yoursecretkeyhere');
CSRF::init('csrf');

$dir = dirname(dirname(__FILE__));

$ez->setDirs(array(
	'views'			=>			$dir . '/views',
	'cache'			=>			$dir . '/views/_cache',
));

$ez->setConfig(array(
	'cache'				=>		true,
	'cache_time'		=>		'2',
	'minify'			=>		true,
));

$config = array(
	'name'		=>		'ezPHP',
);

//CDN::debug(true);
CDN::add('static', '/ezPHP/static');
URL::add('home', '/');

$ez->assign('data', $data);
$ez->assign('config', $config);
$ez->assign('name', 'ezPHP');

//$ez->debug();


?>