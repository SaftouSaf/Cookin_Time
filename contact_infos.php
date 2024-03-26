<?php
require_once(__DIR__ . '/include/functions.php');
/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

if (
    !isset($postData['email'])
    || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
    || empty($postData['message'])
    || trim($postData['message']) === ''
) {
    $postData ["error"] = "Il faut un email et un message valides pour soumettre le formulaire";
    // Arrête l'exécution de ce fichier par PHP
    return;
}

$isFileLoaded = false;
// Testons si le fichier image a bien été envoyé et si il n'ya pas des erreurs
if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === 0) {
    // Testons si le fichier est trop volumineux
    if ($_FILES['screenshot']['size'] > 1000000) {
        $postData ["error"] = "L'envoi n'a pas pu être effectué, erreur ou image trop volumineuse. ";
    }
    // Testons si l'extension n'est pas autorisé 
    $fileInfo = pathinfo($_FILES['screenshot']['name']);
    $extension = $fileInfo['extension'];
    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
    if (!in_array($extension, $allowedExtensions)) {
        $postData ["error"] = "L'envoi n'a pas pu être effectué, l'extension {$extension} n'est pas autorisée. ";
        return;
    }
    // Testons si le dossier uploads est manquant 
    $path = __DIR__ . '/../uploads/';
    if (!is_dir($path)) {
        $postData ["error"] = "L'envoi n'a pas pu être effectué, le dossier uploads est manquant.";
        return;
    }
    $name = $fileInfo['filename'];
    $file = '' .time(). '' .$name. '.' .$extension;
    // On peut valider le fichier et le stocker définitivement
    move_uploaded_file($_FILES['screenshot']['tmp_name'], $path . $file);
    $isFileLoaded = true;
}
?>