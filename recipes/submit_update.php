<?php
session_start();
require_once(__DIR__ . "/../config/mysql.php");
require_once(__DIR__ . "/../include/functions.php");

$postData = $_POST;

if (isset($postData['ok'])) {
    test_input($postData['title'], $postData['recipe'], $postData['author']);
    extract($postData, EXTR_SKIP);
    if (!empty($recipe_id) && !empty($title) && !empty($recipe) && !empty($author) && !empty($is_enabled) && filter_var($author, FILTER_VALIDATE_EMAIL)) {
        $requeteStatement = $mysqlClient->prepare('UPDATE recipes SET title = :title, recipe = :recipe, author = :author, is_enabled = :is_enabled WHERE recipe_id = :recipe_id');
        $requeteStatement->execute(
            array(
                'nom' => $nom,
                'recipe' => $recipe,
                'author' => $author,
                'is_enabled' => $is_enabled
            )
        );
        if ($requeteStatement) {
            $_SESSION['EDIT_RECIPE_SUCCESS'] = "Votre recette a bien été modifiée";
            header("location: /home.php");
        } else {
            $_SESSION['EDIT_RECIPE_ERROR'] = "Une erreur est survenu lors du transfert des données";
            header('location: update.php?id=' . $recipe_id);
            exit();
        }
    } else {
        $_SESSION['EDIT_RECIPE_ERROR'] = "Veuillez remplir tous les champs";
        header("location: update.php?id=" . $recipe_id);
        exit();
    }
}