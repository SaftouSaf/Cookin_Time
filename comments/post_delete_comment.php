<?php session_start();
include_once("./../config/mysql.php");
include_once("./../include/variables.php");

if (!isset($_POST['id'])) {
    $_SESSION['COMMENT_ID_ERROR'] = "Il faut un identifiant de commentaire pour le supprimer";
    header("location : /home.php");
    exit();
}

$id = $_POST['id'];

$deleteComment = $mysqlClient->prepare('DELETE FROM comments WHERE comment_id = :id');
$deleteComment->execute([
    'id' => $id
]);

if($deleteComment) {
    $_SESSION['DEL_COMMENT'] = "Le commentaire a bien été supprimé";
    header("location: ./../recipes/details.php?id=" . $_POST['recipe_id']);
} else {
    $_SESSION['DEL_COMMENT_ERR'] = "Un problème est survenu lors de la suppression";
    header("location: /delete_comment?id=" . $id);
    exit();
}
