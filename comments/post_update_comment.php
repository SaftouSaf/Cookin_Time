<?php session_start();
include_once("./../config/mysql.php");
include_once("./../include/functions.php");

$postData = $_POST;

if(isset($postData['send'])) {
    test_input($postData['comment']);
    extract($postData, EXTR_SKIP);
    if(!empty($comment) && !empty($recipe_id) && is_numeric($recipe_id) && !empty($review) && is_numeric($review) && $review >= 0 && $review <= 5 && !empty($comment_id) && !empty($user_id) && is_numeric($comment_id) && is_numeric($user_id)) {
        $requeteUpdate = $mysqlClient->prepare('UPDATE comments SET recipe_id = :recipe_id, user_id = :user_id, comment = :comment, review = :review WHERE comment_id = :comment_id');
        $requeteUpdate->execute([
            'recipe_id' => $recipe_id,
            'user_id' => $user_id,
            'comment' => $comment,
            'review' => $review,
            'comment_id' => $comment_id
        ]);
        if($requeteUpdate) {
            $_SESSION['EDIT_COMMENT'] = "Votre commentaire a bien été modifié";
            header("location: ./../recipes/details.php?id=" . $recipe_id);
        } else {
            $_SESSION['EDIT_ERR'] = "Un problème est survenu lors de la modification";
            header("location: ./../recipes/details.php?id=" . $recipe_id);
            exit();
        }
    } else {
        $_SESSION['UPDATE_ERR'] = "Votre commentaire ne peut pas être modifié";
        header("location: ./../recipes/details.php?id=" . $recipe_id);
        exit();
    }
}
