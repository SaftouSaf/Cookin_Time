<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/config/databaseconnect.php');
require_once(__DIR__ . '/include/variables.php');
require_once(__DIR__ . '/include/functions.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookin' Time - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 bg-dark text-light">
    <div class="container">
        <!-- Inclusion de l'en tête-->
        <?php require_once(__DIR__ . '/include/header.php'); ?>

        <!-- Si l'utilisateur/trice s'est bien connecté(e), on affiche un message de succès -->
        <?php if (isset($_SESSION['LOGIN_SUCCESS'])) : ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $_SESSION['LOGIN_SUCCESS'];
                unset($_SESSION['LOGIN_SUCCESS']); ?>
            </div>
        <?php endif; ?>

        <!-- Si l'utilisateur/trice ne s'est pas bien connecté(e), on affiche un message d'erreur -->
        <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION["LOGIN_ERROR_MESSAGE"];
                unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
            </div>
        <?php endif; ?>

        <!-- Boucle sur les recettes -->
        <h1 class="mt-3 mb-3">Liste des Recettes !</h1>
        <?php foreach ($recipes as $recipe) : ?>
            <article>
                <h3><?php echo $recipe['title']; ?></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <i><?php echo displayAuthor($recipe['author'], $utilisateurs); ?></i>
            </article><br>
        <?php endforeach; ?>
    </div>

    <!-- Inclusion pied de page-->
    <?php require_once(__DIR__ . '/include/footer.php'); ?>
</body>

</html>