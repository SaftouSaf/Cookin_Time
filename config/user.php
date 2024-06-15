<?php 
//Si le cookie ou la session sont présents
if (isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'email' => $_SESSION['LOGGED_USER'],
    ];
} 