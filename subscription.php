<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookin' Time - Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <h1 class="mt-2 mb-2">Inscription</h1>

        <form action="/Cookin'_Time/submit_sub.php" method="POST">

            <?php if(isset ($_SESSION['SUB_ERROR_MESSAGE'])) :?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['SUB_ERROR_MESSAGE'];
                    unset ($_SESSION['SUB_ERROR_MESSAGE']); ?>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="last_name" class="form-label">Nom*</label>
                <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="last_name" placeholder="Votre nom de famille" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Prénom*</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Votre prénom" required>
            </div>

            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo">
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age*</label>
                <input type="number" class="form-control" id="age" name="age" placeholder="Votre age" min="14" max="90" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email*</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email-d'inscription" placeholder="you@exemple.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe*</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" required>
            </div>

            <div class="mb-3">
                <label for="pwd" class="form-label">Confirmation mot de passe*</label>
                <input type="password" class="form-control" id="pwd" name="pwd" aria-describedby="pwd-confirmation" placeholder="Confirmez votre mot de passe" required>
            </div>

            <button type="submit" class="btn btn-primary mt-2" name="ok">Valider mon inscription</button>
        </form>
    </div>
</body>
</html>