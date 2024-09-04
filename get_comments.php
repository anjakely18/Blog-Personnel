<?php
require_once "includes/connexion.php";
require_once "classes/Comments.php";
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$object = new Comments($db);

$comments = $object->getComments($id);

header('Content-Type: application/json');
echo json_encode($comments);
