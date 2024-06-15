<?php 
session_start();
require_once(__DIR__ . "/config/mysql.php");
require_once(__DIR__ . "/include/functions.php");

$postData = $_POST;

if(isset($_POST['ok'])) {
    test_input($postData['last_name'], $postData['name']);
    extract($postData, EXTR_SKIP);
    if(!empty($last_name) && !empty($name) && !empty($email) && !empty($password) && !empty($pwd) && filter_var($email, FILTER_VALIDATE_EMAIL) && $age > 17 && $age < 100) {
        if($password == $pwd){
            $hashpass = password_hash($password, PASSWORD_DEFAULT);
        } else{
            $_SESSION['SUB_ERROR_MESSAGE'] = "Vous n'avez pas été enregistré car vos mots de passe ne correspondent pas";
            header("Location: subscription.php");
            exit();
        }
        if (isset($pseudo) && $pseudo != "") {
            test_input($pseudo);
        } else {
            $pseudo = null;
        }
        $requete = $mysqlClient->prepare("INSERT INTO users (pseudo, last_name, name, password, email, age) VALUES (:pseudo, :last_name, :name, :password, :email, :age)");
        $requete->execute(
            array (
                "pseudo" => $pseudo,
                "last_name" => $last_name,
                "name" => $name,
                "password" => $hashpass,
                "email" => $email, 
                "age" => $age
            )
        );
        if ($requete){
            $_SESSION['SUB_SUCCESS'] = "Votre compte a bien été crée";
            header("location: index.php");
        } else {
            $_SESSION["SUB_ERROR_MESSAGE"] = "Une erreur a été rencontré lors de l'envoi à la base de donnée";
            header("location: subscription.php");
            exit();
        }
    } else {
        $_SESSION['SUB_ERROR_MESSAGE'] = "Veuillez remplir tous les champs avec des informations valides";
        header("Location: subscription.php");
        exit();
    }
}

?>