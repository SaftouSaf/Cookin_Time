<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/include/functions.php');
require_once(__DIR__ . '/include/variables.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */

$postData = $_POST;

// Validation du formulaire
if (isset($postData['email']) && isset($postData['password'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il faut un email valide pour vous connecter';
    } else {
        foreach ($users as $user) {
            if ($user['email'] === $postData['email'] && password_verify($postData['password'], $user['password'])) {
                $loggedUser = [
                    'email' => $user['email'],
                    'pseudo' => $user['pseudo'],
                    'user_id' => $user['user_id'],
                ];
                $_SESSION['LOGGED_USER'] = $loggedUser['email'];
            } 
        }
        if (!isset($loggedUser)) {
            $_SESSION["LOGIN_ERROR_MESSAGE"] = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
            $postData['email'],
            strip_tags($postData['password'])
            );      
            header("location: index.php");
            exit();  
        } else {
            $_SESSION['LOGIN_SUCCESS'] = "Bonjour ". $_SESSION['LOGGED_USER'] . " et bienvenu sur le site !";
            header("location: home.php");
        }
    }
}
