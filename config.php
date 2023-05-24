<?php
// Inclure les fichiers de configuration et de connexion à la base de données
require_once 'db.php';
// Vérifier si l'utilisateur est connecté

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
// Récupérer les données de l'utilisateur connecté
$db = new Db();
$conn = $db->getConnection();
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare('SELECT * FROM users WHERE id = :user_id');
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>