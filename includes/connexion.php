<?php
require_once 'config/Database.php';
require_once 'models/Article.php';
// require_once 'models/Comment.php';

//Connexion à la base de donnée
$database = new Database();
$db = $database->getConnection();
