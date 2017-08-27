<?php
session_start();
$time_start = microtime(true); 
require_once('core/config.php');

if (isset($_GET['clean']))
	$ez->clearCache();


$repo = 'https://api.github.com/repos/CameronCT/ezPHP/commits';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $repo);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'CameronCT/ezPHP');
$data = curl_exec($curl);
curl_close($curl);

$getCommits = json_decode($data, true);
$ez->assign('Commit', $getCommits[0]);

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