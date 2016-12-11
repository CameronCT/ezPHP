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
	'minify'			=>		false,
));

$config = array(
	'name'		=>		'ezPHP',
);
/*
$data = array(
	'0'	=> array(
		'icon'	=>	'flash_on',
		'title' => 	'Speeds up development',
		'body'	=>	'We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.'
	),
	'1'	=> array(
		'icon'	=>	'group',
		'title' => 	'User Experience Focused',
		'body'	=>	'By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.'
	),
	'2'	=> array(
		'icon'	=>	'settings',
		'title' => 	'Easy to work with',
		'body'	=>	'We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.'
	),
);
*/
$data = array(
	'0'	=> array(
		'icon'	=>	'flash_on',
		'title' => 	'Speeds up development',
		'body'	=>	'We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.'
	),
	'1'	=> array(
		'icon'	=>	'group',
		'title' => 	'User Experience Focused',
		'body'	=>	'By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.'
	),
	'2'	=> array(
		'icon'	=>	'settings',
		'title' => 	'Easy to work with',
		'body'	=>	'We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.'
	),
);

$ez->assign('data', $data);
$ez->assign('config', $config);
$ez->assign('name', 'Testing poop');

//$ez->debug();


?>