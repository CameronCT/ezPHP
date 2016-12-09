<?php
$time_start = microtime(true); 
require_once('core/config.php');

$ez->render('header');
$ez->render('navigation');
$ez->render('index');
$ez->render('footer');

$time_end = microtime(true);

//dividing with 60 will give the execution time in minutes other wise seconds
$execution_time = ($time_end - $time_start)/60;

//execution time of the script
echo '<b>Total Execution Time:</b> '.number_format($execution_time, 10).'';

?>