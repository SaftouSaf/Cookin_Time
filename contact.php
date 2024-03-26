<?php session_start(); 
require_once(__DIR__ . '/contact_infos.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta htt-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookin' Time - Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100 bg-dark text-light">
    <div class="container">
        <?php require_once(__DIR__ . '/include/header.php'); ?>
        <h1 class="mt-2 mb-3">Contactez Nous</h1>
        <form action="submit_contact.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control bg-dark text-light" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com" required>
                <div id="email-help" class="form-text">Nous ne revendrons pas votre email</div>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Votre message</label>
                <textarea class="form-control bg-dark text-light" name="message" id="message" placeholder="Exprimez vous"></textarea>
            </div>
            <div class="mb-3">
                <label for="screenshot" class="form-label">Votre capture d'écran</label>
                <input type="file" class="form-control bg-dark text-light" id="screenshot" name="screenshot">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
    <?php require_once(__DIR__ . '/include/footer.php'); ?>
</body>

</html>