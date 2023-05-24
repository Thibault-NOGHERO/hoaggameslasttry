<?php
session_start();
require_once 'db.php';

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Récupère les informations de l'utilisateur connecté
$db = new Db();
$conn = $db->getConnection();
$stmt = $conn->prepare('SELECT * FROM users WHERE id = :user_id');
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Récupère la liste des amis de l'utilisateur
$stmt = $conn->prepare('SELECT * FROM friends WHERE user_id = :user_id');
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->execute();
while ($friend = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // Récupère les informations sur l'ami
    $stmt2 = $conn->prepare('SELECT * FROM users WHERE id = :friend_id');
    $stmt2->bindParam(':friend_id', $friend['friend_id']);
    $stmt2->execute();
    $friend_info = $stmt2->fetch(PDO::FETCH_ASSOC);
    ?>
    <option value="<?php echo $friend_info['id']; ?>"><?php echo $friend_info['nom']; ?></option>
    <?php
}

// Si le formulaire a été soumis
if (isset($_POST['send_message'])) {
    $friend_id = $_POST['friend_id'];
    $message = $_POST['message'];

    // Envoie le message à l'ami sélectionné
    $current_date = date('Y-m-d H:i:s'); // Store the current date and time in a variable
    $stmt = $conn->prepare('INSERT INTO messages (contenu, date, id, discussion_id) VALUES (:message, :date, :sender_id, :recipient_id)');
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':date', $current_date); // Pass the variable instead of the function result
    $stmt->bindParam(':sender_id', $_SESSION['user_id']);
    $stmt->bindParam(':recipient_id', $friend_id);
    $stmt->execute();
    
    $success_message = 'Votre message a été envoyé !';
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacts</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="custom.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/1z8SoEvPzUHBzIOAU5w6gA2Y7rUp6UJLl0rJ6+" crossorigin="anonymous" />
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-**************" crossorigin="anonymous" />
</head>
<body>
    <h1>Messages d'amis</h1>
    <p>Bienvenue <?php echo htmlspecialchars($user['nom']); ?> !</p>
    <form method="POST">
        <label for="friend_id">Sélectionnez un ami :</label>
        <select name="friend_id">
            <?php foreach ($friends as $friend) { ?>
                <?php
                    // Récupère les informations sur l'ami
                    $stmt = $conn->prepare('SELECT * FROM users WHERE id = :friend_id');
                    $stmt->bindParam(':friend_id', $friend['friend_id']);
                    $stmt->execute();
                    $friend_info = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                <option value="<?php echo $friend_info['id']; ?>"><?php echo $friend_info['nom']; ?></option>
            <?php } ?>
        </select>
        <br>
        <label for="message">Message :</label>
        <textarea name="message"></textarea>
        <br>
        <input type="submit" name="send_message" value="Envoyer le message">
    </form>

    <?php if (isset($success_message)) { ?>
        <p><?php echo $success_message; ?></p>
    <?php } ?>
    <footer>
    <nav>
      <ul>
        <li><a href="forum.php"><i class="fas fa-home"></i></a></li>
        <li><a href="amis.php"><i class="fas fa-user"></i></a></li>
        <li><a href="game.php"><i class="fas fa-gamepad"></i></a></li>
        <li><a href="parle.php"><i class="fas fa-envelope"></i></a></li>
      </ul>
    </nav>
  </footer>
</body>
</html>
