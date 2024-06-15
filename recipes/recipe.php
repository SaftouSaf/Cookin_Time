<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une recette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        <?php require_once(__DIR__ . "/../include/header.php"); ?>
        
        <div class="container mb-3"> 
            <h1>Nouvelle recette</h1>

            <form action="submit_recipe.php" method="POST">
                
                <?php if(isset($_SESSION['ADD_ERROR'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['ADD_ERROR']; 
                        unset ($_SESSION['ADD_ERROR']); ?>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="titre" class="form-label">Titre*</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Le titre de la recette" required>
                </div>

                <div class="mb-3">
                    <label for="recette" class="fomr-label">Recette*</label>
                    <textarea class="form-control" name="recipe" id="recipe" cols="30" rows="5" placeholder="Les différentes étapes de la recette" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="auteur" class="form-label">Auteur*</label>
                    <input type="email" class="form-control" id="author" name="author" placeholder="L'auteur de la recette" required>
                </div>

                <div class="mb-3">
                    <label for="actif" class="form-label">Activation*</label>
                    <select class="form-select" name="is_enabled" id="is_enabled" aria-label="Default select exemple" required>
                        <option selected>Choisissez une option</option>
                        <option value="0">Désactivé</option>
                        <option value="1">Activé</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" name="ok">Ajouter</button>
            </form>
        </div>
        <?php require_once(__DIR__ . "/../include/footer.php"); ?>
    </div>
</body>
</html>