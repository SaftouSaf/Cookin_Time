<?php session_start(); 
?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta htt-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookin' Time - Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php require_once(__DIR__ . '/include/header.php'); ?>
    <div class="container">
        <h1 class="mt-2 mb-3">Contactez Nous</h1>
        <form action="submit_contact.php" method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com" required>
                <div id="email-help" class="form-text">Nous ne revendrons pas votre email</div>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Votre message</label>
                <textarea class="form-control" name="message" id="message" cols="30" rows="5" placeholder="Exprimez vous"></textarea>
            </div>

            <div class="mb-3">
                <label for="screenshot" class="form-label">Votre capture d'écran</label>
                <input type="file" class="form-control" id="screenshot" name="screenshot">
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
    <?php require_once(__DIR__ . '/include/footer.php'); ?>
</body>

</html>