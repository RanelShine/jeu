<?php
header("Content-Type: application/json");

// Inclure la connexion à la base de données
include_once 'connexionbd.php';

// Inclure les fonctions API
include_once 'fonction_api.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        GetUtilisateurs($pdo);
        break;
    case 'POST':
        PostUtilisateurs($pdo, $input);
        break;
    case 'PUT':
        PutUtilisateurs($pdo, $input);
        break;
    case 'DELETE':
        DeleteUtilisateurs($pdo, $input);
        break;
    default:
        echo json_encode(['message' => 'Requête invalide']);
        break;
}
?>