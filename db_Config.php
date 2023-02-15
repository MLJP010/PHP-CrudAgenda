<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$db_hostname = 'localhost';
$db_username = 'db1_87269';
$db_password = '';
$db_database = 'db_87269_crud';

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
?>