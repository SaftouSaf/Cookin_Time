<?php require_once(__DIR__ . '/submit_sub.php'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookin' Time - Inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-dark text-light">
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
                <label for="nom" class="form-label">Nom*</label>
                <input type="text" class="form-control bg-dark text-light" id="nom" name="nom" aria-describedby="nom-de-famille" placeholder="Votre nom de famille" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom*</label>
                <input type="text" class="form-control bg-dark text-light" id="prenom" name="prenom" placeholder="Votre prénom" required>
            </div>
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo*</label>
                <input type="text" class="form-control bg-dark text-light" id="pseudo" name="pseudo" placeholder="Votre pseudo" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control bg-dark text-light" id="age" name="age" placeholder="Votre age" min="14" max="90" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email*</label>
                <input type="email" class="form-control bg-dark text-light" id="email" name="email" aria-describedby="email-d'inscription" placeholder="you@exemple.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe*</label>
                <input type="password" class="form-control bg-dark text-light" id="password" name="password" placeholder="Votre mot de passe" required>
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label">Confirmation mot de passe*</label>
                <input type="password" class="form-control bg-dark text-light" id="mdp" name="mdp" aria-describedby="mdp-confirmation" placeholder="Confirmez votre mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2" name="ok">Valider mon inscription</button>
        </form>
    </div>
</body>
</html>