<?php session_start();
require_once(__DIR__ . '/include/variables.php');
require_once(__DIR__ . '/include/functions.php');
include_once("./config/user.php");
?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookin' Time - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">

    <?php require_once(__DIR__ . '/include/header.php'); ?>

    <div class="container">

        <?php if (isset($_SESSION['LOGIN_SUCCESS'])) : ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $_SESSION['LOGIN_SUCCESS'];
                unset($_SESSION['LOGIN_SUCCESS']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION["LOGIN_ERROR_MESSAGE"];
                unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['ADD_SUCCESS'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['ADD_SUCCESS'];
                unset ($_SESSION['ADD_SUCCESS']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['NO_ID'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['NO_ID'];
                unset ($_SESSION['NO_ID']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['DONT_EXIST'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['DONT_EXIST'];
                unset ($_SESSION['DONT_EXIST']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION["LOGGED"])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION["LOGGED"];
                unset ($_SESSION["LOGGED"]); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION["COMMENT_ID_ERROR"])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION["COMMENT_ID_ERROR"];
                unset ($_SESSION["COMMENT_ID_ERROR"]); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION["NO_COMMENT"])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION["NO_COMMENT"];
                unset ($_SESSION["NO_COMMENT"]); ?>
            </div>
        <?php endif; ?>

        <h1 class="mt-3 mb-3">Liste des Recettes !</h1>
        <?php foreach ($recipes as $recipe) : ?>
            <article class="mb-4">
                <h3><a href="/Cookin'_Time/recipes/details.php?id=<?php echo($recipe['recipe_id']); ?>"><?php echo($recipe["title"]); ?></a></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <i><?php echo (displayAuthor($recipe['author'], $users)); ?></i>
                <?php if (isset($loggedUser) && $recipe['author'] === 
                $loggedUser['email']): ?>
                    <ul class="list-group list-group-horizontal mt-3">
                        <li class="list-group-item">
                            <a class="link-warning" href="/Cookin'_Time/recipes/update.php?id=<?php echo ($recipe['recipe_id']); ?>">Modifier la recette</a>
                        </li>
                        <li class="list-group-item">
                            <a class="link-danger" href="/Cookin'_Time/recipes/delete.php?id=<?php echo ($recipe['recipe_id']); ?>">Supprimer la recette</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </div>

    <!-- Inclusion pied de page-->
    <?php require_once(__DIR__ . '/include/footer.php'); ?>
</body>

</html>