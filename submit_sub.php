<?php 
session_start();
require_once(__DIR__ . "/config/databaseconnect.php");

$postData = $_POST;

if(isset($_POST['ok'])) {
    extract($_POST);
    if(!empty($nom) && !empty($prenom) && !empty($pseudo) && !empty($email) && !empty($password) && !empty($mdp) && filter_var($email, FILTER_VALIDATE_EMAIL) && $age > 13 && $age < 91) {
        if($password == $mdp){
            $hashpass = password_hash($password, PASSWORD_DEFAULT);
        } else{
            $_SESSION['SUB_ERROR_MESSAGE'] = "Vous n'avez pas été enregistré car vos mots de passe ne correspondent pas";
            header("Location: inscription.php");
            exit();
        }
        $requete = $mysqlClient->prepare("INSERT INTO utilisateurs VALUES (0, :pseudo, :nom, :prenom, :mdp, :email, :age)");
        $requete->execute(
            array (
                "pseudo" => $pseudo,
                "nom" => $nom,
                "prenom" => $prenom,
                "mdp" => $hashpass,
                "email" => $email, 
                "age" => $age
            )
        );
        if ($requete){
            $_SESSION['SUB_SUCCESS'] = "Votre compte a bien été crée";
            header("location: index.php");
        } else {
            $_SESSION["SUB_ERROR_MESSAGE"] = "Une erreur a été rencontré lors de l'envoi à la base de donnée";
            header("location: inscription.php");
            exit();
        }
    } 
    else {
        $_SESSION['SUB_ERROR_MESSAGE'] = "Veuillez remplir tous les champs avec des informations valides";
        header("Location: inscription.php");
        exit();
    }
}

?>
