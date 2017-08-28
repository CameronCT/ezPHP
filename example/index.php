<?php
session_start();
$time_start = microtime(true); 
require_once('core/config.php');

if (isset($_GET['clean']))
	$ez->clearCache();

Session::add('User', 'Stuff');

$ez->title('Home');
$ez->render('header');
$ez->render('navigation');
$ez->render('index');

$time_end = microtime(true);
$execution_time = ($time_end - $time_start)/60;
$tot_num = ''.number_format($execution_time, 6).'';
$ez->assign('load', $tot_num);
$ez->render('footer');

?>