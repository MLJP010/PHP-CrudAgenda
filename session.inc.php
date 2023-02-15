<?php
require 'db_Config.php';

session_start();

if (!isset($_SESSION['username']))
{
    header("location:login.html");
    exit;
}
?>