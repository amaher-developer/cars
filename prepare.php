<?php
//error_reporting(E_ALL^E_NOTICE);
error_reporting(0);
//date_default_timezone_set("Asia/Riyadh"); 
include 'config.php';
function __autoload($class_name) {
	$class_file_path = $_SERVER['DOCUMENT_ROOT'].'/cars/classes/' . $class_name . '.php';
    if(file_exists($class_file_path))
		require_once $class_file_path;
	else{
		throw new Exception('Class '.$class_name.' doesn\'t exist');
	}
}        
session_start();


Database::connect(
    Globals::$databaseServer,
    Globals::$databaseUserName,
    Globals::$databasePassword,
    Globals::$databaseName
);
?>