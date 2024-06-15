<?php session_start();

require_once(__DIR__ . "/../config/mysql.php");

$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    $_SESSION['ID_ERROR'] = "Il faut un identifiant de recette pour le modifier";
    header("location: home.php");
    exit();
} else {
    $retrieveRecipeStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE recipe_id = :id');
    $retrieveRecipeStatement->execute([
        'id' => $getData['id'],
    ]);

    $recipe = $retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);

    // si la recette n'est pas trouvé, renvoyer un message d'erreur
    if (!$recipe) {
        $_SESSION['NO_RECIPE'] = "Aucune recette trouvé avec cette ID " . $getData['id'];
        header("location: home.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de recette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include_once(__DIR__ . "/../include/header.php"); ?>
    <div class="container">
        <h1>Modifier la recette</h1>

        <form action="post_update.php" method="POST">

            <div class="mb-3 visually-hidden">
                <input type="hidden" class="form-control" id="recipe_id" name="recipe_id" value="<?php echo ($getData["id"]); ?>">
            </div>

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Le titre de la recette" value="<?php echo ($recipe["title"]); ?>">
            </div>

            <div class="mb-3">
                <label for="recette" class="fomr-label">Recette</label>
                <textarea class="form-control" name="recipe" id="recipe" cols="30" rows="5" placeholder="Les différentes étapes de la recette">
                <?php echo ($recipe["recipe"]); ?>
                </textarea>
            </div>

            <div class="mb-3">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="email" class="form-control" id="author" name="author" placeholder="L'auteur de la recette" value="<?php echo ($recipe["author"]); ?>">
            </div>

            <div class="mb-3">
                <label for="actif" class="form-label">Activation</label>
                <select class="form-select" name="is_enabled" id="is_enabled" aria-label="Default select exemple">
                    <option selected disabled>Choisissez une option</option>
                    <option value="0" <?php echo $recipe['is_enabled'] == "0" ? 'selected' : ''; ?>>Désactivé</option>
                    <option value="1" <?php echo $recipe['is_enabled'] == "1" ? 'selected' : ''; ?>>Activé</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary" name="ok">Ajouter</button>
        </form>
    </div>
</body>
</html>