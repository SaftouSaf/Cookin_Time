<?php
session_start();
include_once ("./../config/mysql.php");
include_once ("./../config/user.php");
include_once("./../include/variables.php");
include_once("./../include/functions.php");

$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    $_SESSION["NO_ID"] = "La recette n'existe pas";
    header("location: home.php");
    exit();
}

$recipe_id = $_GET['id'];

$retrieveRecipeComments = $mysqlClient->prepare('SELECT r.*, c.comment_id, c.comment, c.user_id, u.name, u.last_name, 
    DATE_FORMAT(c.created_at, "%d/%c/%Y") AS comment_date  
    FROM recipes r
    LEFT JOIN comments c ON c.recipe_id = r.recipe_id
    LEFT JOIN users u ON u.user_id = c.user_id
    WHERE r.recipe_id = :id
    ORDER BY comment_date DESC');
$retrieveRecipeComments->execute(["id" => $recipe_id]);
$recipeComments = $retrieveRecipeComments->fetchAll(PDO::FETCH_ASSOC);

if ($recipeComments === []) {
    $_SESSION["DONT_EXIST"] = "La recette n'existe pas";
    header("location : home.php");
    exit();
}

$sqlQuery = 'SELECT ROUND(AVG(c.review),1) AS rating 
    FROM recipes r
    LEFT JOIN comments c ON r.recipe_id = c.recipe_id
    WHERE r.recipe_id = :id';
$retrieveRating = $mysqlClient->prepare($sqlQuery);
$retrieveRating->execute(["id" => $recipe_id]);
$avgRating = $retrieveRating->fetch(PDO::FETCH_ASSOC);

$recipe = [
    'recipe_id' => $recipeComments[0]['recipe_id'],
    'title' => $recipeComments[0]['title'],
    'recipe' => $recipeComments[0]['recipe'],
    'author' => $recipeComments[0]['author'],
    'comments' => [],
    "rating" => $avgRating['rating']
];

foreach ($recipeComments as $comment) {
    if (!is_null($comment['comment_id'])) {
        $recipe['comments'][] = [
            'comment_id' => $comment['comment_id'],
            'comment' => $comment['comment'],
            'user_id' => (int) $comment['user_id'],
            'comment_date' => $comment['comment_date'],
            'name' => $comment['name'],
            'last_name' => $comment['last_name']
        ];
    }
}

?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($recipe['title']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include_once(__DIR__ . "/../include/header.php"); ?>    
    <div class="container">
        <h1><?php echo($recipe['title']); ?></h1>
        <div class="row">
            <article class="col">
                <?php echo($recipe['recipe']); ?> 
            </article>
            <aside>
                <p><i>Contribuée par <?php echo($recipe['author']); ?></i></p>
                <p><b>Evaluée par la communauté à <?php echo($recipe['rating']); ?>/5</b></p>
            </aside>
        </div>
        <hr>
        <h2>Commentaires</h2>
        <?php if ($recipe['comments'] !== []) : ?>
            <div class="row">

                <?php if(isset($_SESSION['DEL_COMMENT'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['DEL_COMMENT']; 
                        unset ($_SESSION['DEL_COMMENT']); ?>
                    </div>
                <?php endif; ?>

                <?php if(isset($_SESSION['EDIT_COMMENT'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['EDIT_COMMENT']; 
                        unset ($_SESSION['EDIT_COMMENT']); ?>
                    </div>
                <?php endif; ?>

                <?php if(isset($_SESSION['EDIT_ERR'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['EDIT_ERR']; 
                        unset ($_SESSION['EDIT_ERR']); ?>
                    </div>
                <?php endif; ?>

                <?php if(isset($_SESSION['UPDATE_ERR'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['UPDATE_ERR']; 
                        unset ($_SESSION['UPDATE_ERR']); ?>
                    </div>
                <?php endif; ?>

                <?php foreach ($recipe['comments'] as $comment) : ?>
                    <div class="comment mb-3">
                        <p><?php echo $comment["comment"]; ?></p>
                        <i>(<?php echo $comment['name'] . " " ; echo $comment['last_name']; ?>)</i>
                        <i>(<?php echo $comment['comment_date']; ?>)</i>
                        <?php if(isset($loggedUser) && $comment['user_id'] === retrieve_id_from_user($loggedUser['email'], $users)): ?>
                            <ul class="list-group list-group-horizontal mt-2">
                                <li class="list-group-item">
                                    <a class="link-warning" href="./../comments/update_comment.php?id=<?php echo($comment['comment_id']); ?>">Modifier le commentaire</a>
                                </li>
                                <li class="list-group-item">
                                    <a class="link-danger" href="./../comments/delete_comment.php?id=<?php echo($comment['comment_id']); ?>">Supprimer le commentaire</a>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="row">
                <p>Aucun commentaire</p>
            </div>
        <?php endif; ?>
        <?php if (isset($loggedUser)) : ?>
            <hr>
            <?php include_once(__DIR__ . "/../comments/add_comments.php"); ?>
        <?php endif; ?>
    </div>
    <?php include_once(__DIR__ . '/../include/footer.php'); ?>
</body>

</html>