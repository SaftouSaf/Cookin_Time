<?php 
session_start();
include_once("./../config/mysql.php");
include_once("./../include/functions.php");
include_once("./../include/variables.php");
include_once("./../config/user.php");

$postData = $_POST;

if(isset($postData['send'])) {
    test_input($postData['comment']);
    extract($postData, EXTR_SKIP);
    if(!empty($comment) && !empty($recipe_id) && is_numeric($recipe_id) && !empty($review) && is_numeric($review) && $review >= 0 && $review <= 5) {
        $requete = $mysqlClient->prepare("INSERT INTO comments (recipe_id, user_id, comment, review) VALUES (:recipe_id, :user_id, :comment, :review)");
        $requete->execute(
            [
                "recipe_id" => $recipe_id,
                "user_id" => retrieve_id_from_user($loggedUser["email"], $users),
                "comment" => $comment,
                "review" => $review
            ]
        );
        if($requete) {
            $_SESSION['COMMENT'] = "Votre commentaire a bien été ajouté";
            header("location: ./../recipes/details.php?id=" . $recipe_id);
        } else {
            $_SESSION['NO_COMMENT'] = "Un problème est survenu lors de l'envoie des données";
            header("location: ./../recipes/details.php?id=" . $recipe_id);
            exit();
        }
    } else {
        $_SESSION['COMMENT_ERR'] = "Votre commentaire ne peut pas être ajouté";
        header("location: ./../recipes/details.php?id=" . $recipe_id);
        exit();
    }
}