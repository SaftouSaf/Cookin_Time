<?php
require_once(__DIR__ . "/submit_login.php");
require_once(__DIR__ . '/include/variables.php');
require_once(__DIR__ . '/include/functions.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookin' Time - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
            <h1 class="mt-2">Connectez Vous</h1>
            <form action="/tests/submit_login.php" method="POST">
                <!-- Si message d'erreur, on l'affiche -->
                <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION["LOGIN_ERROR_MESSAGE"];
                        unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email-connexion" placeholder="you@exemple.com">
                    <div id="email-co" class="form-text">L'email utilisé lors de la création de compte</div>
                </div>
                <div class="mb-3">
                    <label for="mdp" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe">
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Connexion</button>
                    </div>
                    <div class="col">
                        <span class="float-end">
                            <a class="nav-link" href="accueil.php">Continuer sans connexion</a>
                        </span> 
                    </div>
                </div>
            </form>
        <?php else : ?>
            
        <?php endif; ?>

        <!-- Inclusion pied de page-->
        <?php require_once(__DIR__ . '/include/footer.php'); ?>
    </div>
</body>

</html>
