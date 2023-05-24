<?php
session_start();
include_once 'db.php';
include_once 'config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Récupérer les informations de l'utilisateur connecté
$user_id = $_SESSION['user_id'];
$user_name = getUserName($user_id);
$user_image = getUserImage($user_id);
$friends = getFriends($user_id);
$non_friends = getNonFriends($user_id);

// Vérifier si un utilisateur a été sélectionné pour le chat
if (isset($_GET['user_id'])) {
    $friend_id = $_GET['user_id'];
    $friend_name = getUserName($friend_id);
    $friend_image = getUserImage($friend_id);

    // Vérifier si une discussion existe entre l'utilisateur connecté et l'utilisateur sélectionné
    $discussion_id = getDiscussionId($user_id, $friend_id);

    // Si aucune discussion n'existe, créer une nouvelle discussion
    if ($discussion_id == null) {
        $discussion_id = createDiscussion($user_id, $friend_id);
    }

    // Récupérer les messages de la discussion
    $messages = getDiscussionMessages($discussion_id);

    // Vérifier si le formulaire d'envoi de message a été soumis
    if (isset($_POST['submit_message']) && isset($_POST['message'])) {
        $message = $_POST['message'];

        // Insérer le message dans la base de données
        insertMessage($message, $user_id, $discussion_id);

        // Actualiser la page pour afficher le nouveau message
        header("Location: parle.php?user_id=$friend_id");
        exit;
    }
} else {
    // Si aucun utilisateur n'a été sélectionné, afficher la liste des utilisateurs connectés
    $connected_users = getConnectedUsers();
}

function getUserName($user_id)
{
    require_once('db.php');

    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('SELECT nom FROM users WHERE id = :user_id');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['nom'];
}

function getUserImage($user_id)
{
    require_once('db.php');

    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('SELECT image FROM users WHERE id = :user_id');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['image'];
}

function getConnectedUsers()
{
    require_once('db.php');

    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('SELECT id, nom, image FROM users WHERE est_connecte = 1 AND id != :user_id');
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getDiscussionId($user_id, $friend_id)
{
    require_once('db.php');

    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('SELECT id FROM discussions WHERE (user1_id = :user_id AND user2_id = :friend_id) OR (user1_id = :friend_id AND user2_id = :user_id)');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':friend_id', $friend_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result['id'];
    } else {
        return null;
    }
}

function createDiscussion($user_id, $friend_id)
{
    require_once('db.php');
    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('INSERT INTO discussions (user1_id, user2_id) VALUES (:user1_id, :user2_id)');
    $stmt->bindParam(':user1_id', $user_id);
    $stmt->bindParam(':user2_id', $friend_id);
    $stmt->execute();

    return $conn->lastInsertId();
}

function getDiscussionMessages($discussion_id)
{
    require_once('db.php');
    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('SELECT messages.id_message, messages.contenu, messages.date, messages.id, messages.discussion_id, users.nom, users.image FROM messages JOIN users ON messages.id = users.id WHERE discussion_id = :discussion_id ORDER BY messages.date ASC');
    $stmt->bindParam(':discussion_id', $discussion_id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertMessage($message, $user_id, $discussion_id)
{
    require_once('db.php');
    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('INSERT INTO messages (contenu, date, id, discussion_id) VALUES (:contenu, NOW(), :id, :discussion_id)');
    $stmt->bindParam(':contenu', $message);
    $stmt->bindParam(':id', $user_id);
    $stmt->bindParam(':discussion_id', $discussion_id);
    $stmt->execute();
}
function getFriends($user_id)
{
    require_once('db.php');
    $db = new Db();
    $conn = $db->getConnection();
    $stmt = $conn->prepare('SELECT users.id AS friend_id, users.nom AS friend_name, users.image AS friend_image, friends.statut AS friend_statut FROM friends JOIN users ON friends.friend_id = users.id WHERE friends.user_id = :user_id');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getNonFriends($user_id)
{
    require_once('db.php');
    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('SELECT * FROM users WHERE id != :user_id AND id NOT IN (SELECT friend_id FROM friends WHERE user_id = :user_id AND statut != "non-ami")');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function addFriend($user_id, $friend_id)
{
    require_once('db.php');
    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('INSERT INTO friends (user_id, friend_id, statut) VALUES (:user_id, :friend_id, :statut)');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':friend_id', $friend_id);
    $stmt->bindValue(':statut', 'en attente');
    $stmt->execute();

    // Actualiser la liste d'amis
    $_SESSION['friends'] = getFriends($user_id);
}

?>
<!DOCTYPE html>

<html lang="fr">

<head>
    <title>tchat</title>
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
        <div class="user-info">
            <img src="uploads/<?php echo $user_image; ?>" alt="Image utilisateur" class="profile-image">
            <span class="username">
                <?php echo $user_name; ?>
            </span>
            <a href="logout.php">Se déconnecter</a>
        </div>
    </header>
    <main>
        <div class="discussion-container">
            <?php if (isset($connected_users)) : ?>
                <h1>Utilisateurs connectés</h1>
                <div class="columns">
                    <div class="column">
                        <h2>Amis</h2>
                        <ul class="user-list">
                            <?php
                            foreach ($friends as $friend) :
                            ?>
                                <?php if (count($friends) == 0) : ?>
                                    <p>Aucun ami trouvé.</p>
                                <?php endif; ?>
                                <li>
                                    <a href="parle.php?user_id=<?php echo $friend['friend_id']; ?>">
                                        <img src="uploads/<?php echo $friend['friend_image']; ?>" alt="Image ami" class="profile-image">
                                        <span>
                                            <?php echo $friend['friend_name']; ?>
                                        </span>
                                    </a>
                                    <?php if (isset($friend['statut']) && $friend['statut'] == "attente") : ?>
                                        <span class="friend-status">En attente</span>
                                    <?php endif; ?>
                                    <a href="user_profile.php?user_id=<?php echo $friend['friend_id']; ?>"><button class="view-profile">Voir le profil</button></a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                    <div class="column">
                        <h2>Futurs amis ?</h2>
                        <ul class="user-list">
                            <?php foreach ($non_friends as $non_friend) :
                            ?>
                                <li>
                                    <a href="parle.php?user_id=<?php echo $non_friend['id']; ?>">
                                        <img src="uploads/<?php echo $non_friend['image']; ?>" alt="Image non-ami" class="profile-image">
                                        <span>
                                            <?php echo $non_friend['nom']; ?>
                                        </span>
                                    </a>
                                    <a href="user_profile.php?user_id=<?php echo $non_friend['id']; ?>"><button class="view-profile">Voir le profil</button></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php else : ?>
                <div class="chat-window">


                    <ul class="message-list">
                        <?php foreach ($messages as $message) : ?>
                            <?php if ($message['id'] == $user_id) : ?>
                                <li class="sent">
                                    <img src="uploads/<?php echo $user_image; ?>" alt="Image utilisateur" class="profile-image">
                                    <p>
                                        <?php echo $message['contenu']; ?>
                                    </p>
                                </li>
                            <?php else : ?>
                                <li class="received">
                                    <img src="uploads/<?php echo $message['image']; ?>" alt="Image utilisateur" class="profile-image">
                                    <div class="message-content">
                                        <div class="message-header">
                                            <span class="username">
                                                <?php echo $message['nom']; ?>
                                            </span>
                                            <span class="message-time">
                                                <?php echo date_format(date_create($message['date']), 'H:i'); ?>
                                            </span>
                                        </div>
                                        <div class="message-body">
                                            <?php echo $message['contenu']; ?>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>

                        <?php endforeach; ?>

                    </ul>

                    <form class="send-message-form" action="" method="post">
                        <input type="text" name="message" placeholder="Entrez votre message...">
                        <button type="submit" name="submit_message"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            <?php endif; ?>
            <div class="discussion-container">
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