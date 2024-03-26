<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/config/databaseconnect.php');
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
        
        foreach ($utilisateurs as $users) {
            if ($users['email'] === $postData['email'] && password_verify($postData['password'], $users['mdp'])) {
                $_SESSION['LOGGED_USER'] = [
                    'pseudo' => $users['pseudo'],
                    'user_id' => $users['user_id'],
                ];
            }
        }

        if (!isset($_SESSION['LOGGED_USER'])) {
            $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf(
                'Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $postData['email'],
                strip_tags($postData['password'])
            );
        } else {
            $_SESSION['LOGIN_SUCCESS'] = "Bonjour ". $_SESSION['LOGGED_USER']['pseudo'] . " et bienvenu sur le site !";
        }
        redirectToUrl("/Cookin'_Time/accueil.php");
    }
    redirectToUrl("/Cookin'_Time/index.php");
} 
?>