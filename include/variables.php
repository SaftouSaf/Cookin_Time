<?php
require_once(__DIR__ . "/../config/mysql.php");

// On récupère tout le contenu de la table de recette avec MySQL
$recipesStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE is_enabled is TRUE');
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

// On récupère tout le contenu de la table des users avec MySQL
$usersStatement = $mysqlClient->prepare('SELECT * FROM users');
$usersStatement->execute();
$users = $usersStatement->fetchAll();
?>