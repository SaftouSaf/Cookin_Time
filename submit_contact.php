<?php require_once(__DIR__ . '/contact_infos.php'); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookin' Time - Confirmation Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php require_once(__DIR__ . '/include/header.php'); ?>
        <?php if (isset($postData["error"])) : ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo $postData["error"]; ?>
            </div>
            <a class="nav-link mb-3" href="contact.php">Retour à la page de contact</a>
            <?php return; ?>
        <?php endif; ?>
        <h1>Message bien reçu !</h1>

        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Rappel de vos informations</h5>
                <p class="card-text"><b>Email</b> : <?php echo ($postData['email']); ?></p>
                <p class="card-text"><b>Message</b> : <?php echo (strip_tags($postData['message'])); ?></p>
                <?php if ($isFileLoaded) : ?>
                    <div class="alert alert-success" role="alert">
                        <p class="card-text"><b>Capture d'écran</b> : <?php echo "L'envoi a bien été effectué !" ?> </p>
                    </div>
                <?php endif; ?>
            </div>
            <a class="nav-link mb-3" href="accueil.php">Retour à l'accueil</a>
        </div>
    </div>
    <?php require_once(__DIR__ . '/include/footer.php'); ?>
</body>

</html>