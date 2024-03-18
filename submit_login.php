<?php
session_start();
require_once(__DIR__ . '/include/functions.php');
require_once(__DIR__ . '/include/variables.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
*/

$postData = $_POST;

// Validation du formulaire
if (isset($postData['email']) && isset($postData['mdp'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il faut un email valide pour vous connecter';
    } else {
        foreach ($users as $user) {
            if (
                $user['email'] === $postData['email'] &&
                $user['mdp'] === $postData['mdp']
            ) {
                $_SESSION['LOGGED_USER'] = [
                    'email' => $user['email'],
                    'user_id' => $user['user_id'],
                ];
            }
        }

        if (!isset($_SESSION['LOGGED_USER'])) {
            $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf(
                'Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $postData['email'],
                strip_tags($postData['mdp'])
            );
        } 
        redirectToUrl('accueil.php');
    }
    redirectToUrl('index.php');
} 
?>