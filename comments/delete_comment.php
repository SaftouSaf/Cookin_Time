<?php session_start();
include_once("./../config/mysql.php");
include_once("./../include/variables.php");

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['COMMENT_ID_ERROR'] = "Il faut un identifiant de commentaire pour le supprimer";
    header("location : /home.php");
    exit();
} else {
    $retrieveComment = $mysqlClient->prepare('SELECT * FROM comments WHERE comment_id = :id');
    $retrieveComment->execute([
        'id' => $_GET['id']
    ]);

    $comment = $retrieveComment->fetch(PDO::FETCH_ASSOC);

    if(!$comment) {
        $_SESSION['NO_COMMENT'] = "Aucun commentaire trouvé avec cette ID" . $_GET['id'];
        header("location: /home.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un commentaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include_once("./../include/header.php"); ?>
    <div class="container">
        <h1 class="mb-3">Supprimer votre commentaire</h1>

        <form action="post_delete_comment.php" method="POST">
            <?php if(isset($_SESSION['DEL_COMMENT_ERR'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['DEL_COMMENT_ERR']; 
                    unset ($_SESSION['DEL_COMMENT_ERR']); ?>
                </div>
            <?php endif; ?>

            <div class="mb-3 visually-hidden">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $_GET['id']; ?>">
            </div>

            <div class="mb-3 visually-hidden">
                <input type="hidden" class="form-control" id="recipe_id" name="recipe_id" value="<?php echo($comment['recipe_id']); ?>">
            </div>

            <button type="submit" class="btn btn-danger">La suppression est définitive</button>
        </form>
    </div> 
    <?php include_once("./../include/footer.php"); ?>
</body>
</html>