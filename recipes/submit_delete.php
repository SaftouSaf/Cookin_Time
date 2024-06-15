<?php
session_start();

require_once(__DIR__ . "/../config/mysql.php");
require_once(__DIR__ . "/../include/variables.php");

if (!isset($_POST['id'])) {
	$_SESSION['RECIPE_ID_ERROR'] = "Il faut un identifiant de recette pour la supprimer";
    header("location: /home.php.php");
    exit();
}	

$id = $_POST['id'];

$deleteRecipeStatement = $mysqlClient->prepare('DELETE FROM recipes WHERE recipe_id = :id');
$deleteRecipeStatement->execute([
    'id' => $id,
]);

if ($deleteRecipeStatement) {
    $_SESSION['SUPP_RECIPE'] = "La recette a bien été supprimée";
    header('Location: /home.php');
} else {
    $_SESSION['SUPP_RECIPE_ERROR'] = "Un problème est survenu lors de l'opération";
    header("location: /delete.php?id=" . $id);
    exit();
}
