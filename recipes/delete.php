<?php session_start();
require_once(__DIR__ . "/../config/mysql.php");
require_once(__DIR__ . "/../include/variables.php");

$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    $_SESSION['RECIPE_ID_ERROR'] = "Il faut un identifiant de recette pour le supprimer";
    header("location: /home.php");
    exit();
} else {
    $retrieveRecipeStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE recipe_id = :id');
    $retrieveRecipeStatement->execute([
        'id' => $getData['id'],
    ]);

    $recipe = $retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);

    // Si la recette n'est pas trouvé, renvoyer un message d'erreur
    if (!$recipe) {
        $_SESSION['NO_RECIPE'] = "Aucune recipe trouvé avec cette ID " . $getData['id'];
        header("location: /home.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une recette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <h1 class="mb-3">Supprimer une recette</h1>

        <form action="submit_delete.php" method="POST">
            <div class="mb-3 visually-hidden">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $_GET['id']; ?>">
            </div>

            <button type="submit" class="btn btn-danger">La supression est définitive</button>
        </form>
    </div>
</body>

</html>