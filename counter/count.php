<?php 
// Cette ligne ouvre le fichier 'last_ip.txt' en mode lecture et écriture. Si le fichier n'existe pas, il sera créé. La variable $ip contiendra le pointeur de fichier pour ce fichier.
$ip = fopen('last_ip.txt', 'c+'); 

// Cette ligne lit la première ligne du fichier 'last_ip.txt', qui est supposée contenir la dernière adresse IP enregistrée.
$check = fgets($ip);

// Cette ligne ouvre le fichier 'compteur.txt' de la même manière que précédemment. Ce fichier est utilisé pour stocker le compteur de visites.
$file = fopen('counter.txt', 'c+');

// Cette ligne lit la première ligne du fichier 'compteur.txt'. La fonction intval() est utilisée pour convertir cette valeur en un entier.
$count = intval(fgets($file));

// Cette ligne vérifie si l'adresse IP actuelle de l'utilisateur, est différente de celle stockée dans le fichier 'last_ip.txt'. Cela permet de vérifier si l'utilisateur est nouveau ou s'il a déjà visité le site.
if($_SERVER['REMOTE_ADDR'] != $check) {
    // Cette ligne ferme le fichier 'last_ip.txt' après avoir utilisé l'adresse IP pour la comparaison.
    fclose($ip);

    // Cette ligne ouvre à nouveau le fichier 'last_ip.txt' en mode écriture seule cette fois, pour le réécrire avec la nouvelle adresse IP de l'utilisateur.
    $ip = fopen('last_ip.txt', 'w+');
    
    // Cette ligne écrit l'adresse IP actuelle de l'utilisateur dans le fichier 'last_ip.txt'.
    fputs($ip, $_SERVER['REMOTE_ADDR']);

    // Cette ligne incrémente le compteur de visites.
    $count++;

    // Cette ligne déplace le pointeur de fichier au début du fichier 'compteur.txt'.
    fseek($file, 0);

    // Cette ligne écrit la nouvelle valeur du compteur dans le fichier 'compteur.txt'.
    fputs($file, $count);
}

// Les lignes suivantes ferment les fichiers 'compteur.txt' et 'last_id.txt'. 
fclose($file);
fclose($ip);
echo('<p class="d-flex justify-content-center">Cette page a été vue ' . $count . ' fois !</p>');