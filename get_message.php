<?php
session_start();
include_once 'db.php';
include_once 'config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    die('Utilisateur non connecté');
}

// Vérifier si l'ID de discussion est spécifié
if (!isset($_GET['discussion_id'])) {
    die('ID de discussion manquant');
}

// Récupérer l'ID de discussion et les messages associés
$discussion_id = $_GET['discussion_id'];
$messages = getDiscussionMessages($discussion_id);

// Convertir les messages en format JSON et les renvoyer en tant que réponse AJAX
echo json_encode($messages);

// Fonction pour récupérer les messages d'une discussion

function getDiscussionMessages($discussion_id) {
    require_once('db.php');
    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('SELECT messages.id_message, messages.contenu, messages.date, messages.id, messages.discussion_id, users.nom, users.image FROM messages JOIN users ON messages.id = users.id WHERE discussion_id = :discussion_id ORDER BY messages.date ASC');
    $stmt->bindParam(':discussion_id', $discussion_id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
