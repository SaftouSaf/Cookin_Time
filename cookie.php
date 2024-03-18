<?php 
//Retenir l'email de la personne connecté pendant 1 an
setcookie (
    'LOGGED_USER',
    'mickael.andrieu@exemple.com',
    [
        'expires' => time() + 365*24*3600,
        'secure' => true,
        'httponly' => true,
    ]
);
?>