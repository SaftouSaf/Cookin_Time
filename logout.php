<?php
require_once(__DIR__ . '/include/functions.php'); 
session_start();
session_destroy(); 
redirectToUrl('index.php');
?>