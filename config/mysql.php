<?php 
const MYSQL_HOST = 'localhost';
const MYSQL_PORT = 3306;
const MYSQL_NAME = 'cookin_time';
const MYSQL_USER = 'root';
const MYSQL_PASSWORD = '';

try {
    // On se connecte à MySQL
    $mysqlClient = new PDO (
        sprintf('mysql:host=%s;dbname=%s;port=%s;charset=utf8', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER, 
        MYSQL_PASSWORD
    );
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $exception) {
    // En cas d'erreur, on affiche un message d'erreur et on arrête tout
    die('Erreur : ' . $exception->getMessage());
}