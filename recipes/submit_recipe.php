<?php 
session_start();
include_once("./../config/mysql.php");
include_once('./../config/user.php');
include_once("./../include/functions.php");

$postData = $_POST;

if(isset($postData['ok'])) {
    test_input($postData["title"], $postData["recipe"]);
    extract($postData, EXTR_SKIP);
    if(!empty($title) && !empty($recipe) && !empty($author) && !empty($is_enabled) && filter_var($author, FILTER_VALIDATE_EMAIL)) {
        $requete = $mysqlClient->prepare("INSERT INTO recipes (title, recipe, author, is_enabled) VALUES(:title, :recipe, :author, :is_enabled)");
        $requete->execute(
            array(
                "title" => $title,
                "recipe" => $recipe,
                "author" => $author,
                "is_enabled" => $is_enabled
            )
        );
        if($requete){
            $_SESSION['ADD_SUCCESS'] = "Votre recette a bien été ajouté";
            header("location: home.php");
        } else {
            $_SESSION["ADD_ERROR"] = "Une erreur a été rencontré lors de l'envoi à la base de donnée";
            header("location: home.php");
            exit();
        }
    } else {
        $_SESSION['ADD_ERROR'] = "Veuillez remplir tous les champs avec des informations valides";
        header("location: subscription.php");
        exit();
    }
}


