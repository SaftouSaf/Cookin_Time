<?php
require_once(__DIR__ . "/../config/databaseconnect.php");

// On récupère tout le contenu de la table de recette avec MySQL
$recipesStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE is_enabled is TRUE');
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

// On récupère tout le contenu de la table des utilisateurs avec MySQL
$utilisateursStatement = $mysqlClient->prepare('SELECT * FROM utilisateurs');
$utilisateursStatement->execute();
$utilisateurs = $utilisateursStatement->fetchAll();
?>