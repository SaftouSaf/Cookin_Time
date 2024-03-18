<?php
// Redirection url
function redirectToUrl(string $url): never
{
    header("Location: {$url}");
    exit();
}

// Vérifier si les recettes sont valides 
function isValidrecipe(array $recipes) : bool
{
    if(array_key_exists('is_enabled', $recipes)) {
        $isEnabled = $recipes['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;

}

// Récupérer les recettes valides
function getRecipes(array $recipes) : array
{
    $validRecipes = [];

    foreach($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }

    return $validRecipes; 

}

// Afficher le nom de l'auteur des recettes
function displayAuthor(string $authorEmail, array $users): string
{
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['full_name'] . ' (' . $user['age'] . ' ans)';
        }
    }
}
return 'Auteur inconnu';

?>