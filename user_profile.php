<?php
session_start();
include_once 'db.php';
include_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['user_id'])) {
    $profile_user_id = $_GET['user_id'];
    $profile_user = getUserDetails($profile_user_id);
} else {
    header('Location: parle.php');
    exit;
}

function getUserDetails($user_id) {
    require_once('db.php');

    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('SELECT * FROM users WHERE id = :user_id');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function sendFriendRequest($user_id, $friend_id, $friend_name) {
    require_once('db.php');
    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('INSERT INTO friends (user_id, statut, date_demande, friend_id, friend_name) VALUES (:user_id, "en_attente", NOW(), :friend_id, :friend_name)');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':friend_id', $friend_id);
    $stmt->bindParam(':friend_name', $friend_name);
    $stmt->execute();

}
function isFriend($current_user_id, $profile_user_id) {
    require_once('db.php');
    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('SELECT * FROM friends WHERE user_id = :current_user_id AND friend_id = :profile_user_id');
    $stmt->bindParam(':current_user_id', $current_user_id);
    $stmt->bindParam(':profile_user_id', $profile_user_id);
    $stmt->execute();

    return $stmt->rowCount() > 0;
}
function removeFriend($current_user_id, $profile_user_id) {
    require_once('db.php');
    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('DELETE FROM friends WHERE user_id = :current_user_id AND friend_id = :profile_user_id');
    $stmt->bindParam(':current_user_id', $current_user_id);
    $stmt->bindParam(':profile_user_id', $profile_user_id);
    $stmt->execute();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'add_friend') {
        sendFriendRequest($_SESSION['user_id'], $profile_user_id, $profile_user['nom']);
    } elseif ($_POST['action'] === 'remove_friend') {
        removeFriend($_SESSION['user_id'], $profile_user_id);
    }
    header('Location: user_profile.php?user_id=' . $profile_user_id);
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Profil de l'utilisateur</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="custom.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>
<body>
<header>
</header>
<main>
<div class="user-profile">
<h1>Profil</h1>
    <img class="profile-img" src="uploads/<?php echo $profile_user['image']; ?>" alt="Image utilisateur">
    <h2><?php echo $profile_user['nom']; ?></h2>
    <p class="bio-desc">Bio: <?php echo $profile_user['bio']; ?></p>
    <p class="jeux_prefere">console: <?php echo $profile_user['jeux_favoris']; ?></p>
</div>
<!--ajouter et supprimer amis-->
<div class="ajouter_amis">
<form method="post" action="">
    <?php if (isFriend($_SESSION['user_id'], $profile_user_id)): ?>
        <input type="hidden" name="action" value="remove_friend">
        <button type="submit" class="remove-friend">Supprimer comme ami</button>
    <?php else: ?>
        <input type="hidden" name="action" value="add_friend">
        <button type="submit" class="add-friend">Ajouter comme ami</button>
    <?php endif; ?>
</form>
</div>


</main>
<footer>
    <nav>
      <ul>
        <li><a href="forum.php"><i><span class="material-symbols-outlined">
                home
              </span></i></a></li>
        <li><a href="contact.php"><i class=""><span class="material-symbols-outlined">
person
</span></i></a></li>
        <li><a href="game.php"><i class=""><span class="material-symbols-outlined">
sports_esports
</span></i></a></li>
        <li><a href="parle.php"><i class=""><span class="material-symbols-outlined">
groups
</span></i></a></li>
      </ul>
    </nav>
  </footer>
</body>
</html>
