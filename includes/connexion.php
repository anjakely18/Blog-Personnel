<?php
require_once 'classes/Database.php';
require_once 'classes/Article.php';
require "classes/Comments.php";

//Connexion à la base de donnée
$database = new Database();
$db = $database->getConnection();
