<?php
session_start();
include_once 'db.php';
include_once 'config.php';

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données envoyées par le formulaire
    $senderId = $_POST['sender_id'];
    $receiverId = $_POST['receiver_id'];
    $message = $_POST['message'];
    // Insérez le message dans la base de données en localhost
    //$pdo = new PDO('mysql:host=localhost;dbname=mobi', 'root', '');
//sur server infinityfree
$pdo = new PDO('mysql:host=localhost;dbname=hoaggameslasttry;charset=utf8', 'root', '');
    $stmt = $pdo->prepare('INSERT INTO messages (sender_id, receiver_id, message_content) VALUES (?, ?, ?)');
    $stmt->execute([$senderId, $receiverId, $message]);
    // Envoyez une réponse JSON pour indiquer que l'opération a réussi
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
}
?>