<?php
//$time_start = microtime(true);

error_reporting(E_ERROR | E_PARSE);
use App\Application;

//Global Helper
// Require RedbeanPHP ORM
require_once '../database/RedBeanPHP.php';

//Autoload
require_once '../vendor/autoload.php';

//Create instanceof Application
$application = new Application();

// Run app
echo $application->run();
//$time_end = microtime(true);
//$execution_time = ($time_end - $time_start)/60;
//dd($execution_time);
