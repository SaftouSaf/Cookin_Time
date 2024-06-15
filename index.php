<?php session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/include/variables.php');
require_once(__DIR__ . '/include/functions.php');
?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookin' Time - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="mb-3" style="background-color: #222425">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container p2">
                <h1>Connectez Vous</h1>
                <a class="btn btn-primary" href="subscription.php" role="button">Inscription</a>
            </div>
        </nav>
    </header>
    
    <div class="container">
        <?php if (!isset($loggedUser)) : ?>
            <form action="/Cookin'_Time/submit_login.php" method="POST">
                
                <!-- Si message d'erreur, on l'affiche -->
                <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION["LOGIN_ERROR_MESSAGE"];
                        unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
                    </div>
                <?php endif; ?>

                <!-- Si création de compte, on l'affiche -->
                <?php if (isset($_SESSION['SUB_SUCCESS'])) : ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['SUB_SUCCESS'];
                        unset($_SESSION['SUB_SUCCESS']); ?>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="email" class="form-label">Email*</label>
                    <input type="email" class="form-control bg-dark text-light" id="email" name="email" aria-describedby="email-connexion" placeholder="you@exemple.com" required>
                    <div id="email-co" class="form-text">L'email utilisé lors de la création de compte</div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe*</label>
                    <input type="password" class="form-control bg-dark text-light" id="password" name="password" placeholder="Mot de passe" required>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Connexion</button>
                    </div>
                    <div class="col">
                        <span class="float-end">
                            <a class="link" href="home.php">Continuer sans connexion</a>
                        </span>
                    </div>
                </div>
            </form>
        <?php else : ?>
            <?php header("location : home.php"); ?>
        <?php endif; ?>
    </div>
    
    <?php include_once(__DIR__ . '/include/footer.php'); ?>
</body>

</html>