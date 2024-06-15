<?php

// Afficher le nom de l'auteur des recettes
function displayAuthor(string $authorEmail, array $users): string
{
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['name'] . " " . $user['last_name'] . ' (' . $user['age'] . ' ans)';
        }
    }
    return 'Auteur inconnu';
}

function retrieve_id_from_user(string $userEmail, array $users) : int {
    for ($i = 0; $i < count($users); $i++) {
        $user = $users[$i];
        if ($userEmail === $user['email']) {
            return $user['user_id'];
        }
    }
    return 0;
}

// function get_recipes(array $recipes, int $limit): array {
//     $valid_recipes = [];
//     $counter = 0;

//     foreach ($recipes as $recipe) {
//         if ($counter == $limit) {
//             return $valid_recipes;
//         }
//         $valide_recipes[] = $recipe;
//         $counter++;
//     }
//     return $valid_recipes;
// }

//Fonction qui vérifie les données entrées
function test_input($postData)
{
    $postData = trim($postData);
    $postData = stripslashes($postData);
    $postData = htmlspecialchars($postData);
    return $postData;
}


// function display_recipe(array $recipe) : string {
//     $recipe_content = '';
//     if ($recipe['is_enabled']) {
//         $recipe_content = '<article>';
//         $recipe_content .= '<h3>' . $recipe['title'] . '</h3>';
//         $recipe_content .= '<div>' . $recipe['recipe'] . '</div>';
//         $recipe_content .= '<i>' . $recipe['author'] . '</i>';
//         $recipe_content .= '</article>';
//     }
//     return $recipe_content;
// }

?>