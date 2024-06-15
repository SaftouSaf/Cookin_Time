<?php session_start();
require_once(__DIR__ . '/include/functions.php'); 
session_unset();
session_destroy(); 
header("location: index.php");
?>