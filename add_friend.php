<?php
session_start();
include_once 'db.php';
include_once 'config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Vérifier si un utilisateur a été sélectionné pour l'ajout en ami
if (isset($_GET['user_id'])) {
    $friend_id = $_GET['user_id'];

    // Vérifier si l'utilisateur à ajouter en ami existe dans la base de données
    $user = getUserById($friend_id);

    if ($user == null) {
        header('Location: index.php');
        exit;
    }

    // Vérifier si l'utilisateur est déjà ami avec l'utilisateur sélectionné
    $is_friend = isFriend($_SESSION['user_id'], $friend_id);

    if ($is_friend) {
        header("Location: user_profile.php?user_id=$friend_id");
        exit;
    }

    // Ajouter l'utilisateur sélectionné en ami dans la base de données
    addFriend($_SESSION['user_id'], $friend_id);
    header("Location: user_profile.php?user_id=$friend_id");
    exit;
} else {
    header('Location: index.php');
    exit;
}

function getUserById($user_id)
{
    require_once('db.php');

    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('SELECT * FROM users WHERE id = :user_id');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function isFriend($user_id, $friend_id)
{
    require_once('db.php');
    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('SELECT * FROM friends WHERE user_id = :user_id AND friend_id = :friend_id AND statut = "accepte"');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':friend_id', $friend_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function addFriend($user_id, $friend_id)
{
    require_once('db.php');
    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('INSERT INTO friends (user_id, friend_id, friend_name, statut) VALUES (:user_id, :friend_id, :friend_name, :statut)');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':friend_id', $friend_id);
    $stmt->bindValue(':friend_name', ''); // Valeur vide pour friend_name
    $stmt->bindValue(':statut', 'attente');
    $stmt->execute();
    
}
