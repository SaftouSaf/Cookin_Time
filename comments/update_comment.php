<?php session_start();
include_once("./../config/mysql.php");
include_once("./../include/functions.php");
include_once("./../include/variables.php");
include_once("./../config/user.php");

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['COMMENT_ID_ERR'] = "Il faut un identifiant de commentaire pour le modifier";
    header("location: home.php");
    exit();
} else {
    $retrieveComment = $mysqlClient->prepare('SELECT * FROM comments WHERE comment_id = :id');
    $retrieveComment->execute([
        'id' => $_GET['id']
    ]);

    $comment = $retrieveComment->fetch(PDO::FETCH_ASSOC);

    if (!$comment) {
        $_SESSION['NO_COMMENT'] = "Aucun commentaire trouvé avec cette ID" . $_GET['id'];
        header("location: home.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un commentaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include_once('./../include/header.php'); ?>
    <div class="container">
        <h1>Modifier un commentaire</h1>

        <form action="post_update_comment.php" method="POST">
            <div class="mb-3 visually-hidden">
                <input type="hidden" class="form-control" name="comment_id" value="<?php echo ($_GET['id']); ?>">
            </div>

            <div class="mb-3 visually-hidden">
                <input type="hidden" class="form-control" name="user_id" value="<?php echo (retrieve_id_from_user($loggedUser['email'], $users)) ?>">
            </div>

            <div class="mb-3 visually-hidden">
                <input class="form-control" type="text" name="recipe_id" value="<?php echo ($comment['recipe_id']); ?>">
            </div>

            <div class="mb-3">
                <label for="comment" class="form-label">Modifier votre commentaire</label>
                <textarea class="form-control" name="comment" id="comment" placeholder="Veuillez rester respectueux et constructif."><?php echo ($comment['comment']); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="review" class="form-label">Notez la recette</label>
                <input type="number" class="form-control" value="<?php echo ($comment['review']) ?>" name="review" min="0" max="5">
            </div>

            <button type="submit" name="send" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
    <?php include_once("./../include/footer.php"); ?>
</body>

</html>