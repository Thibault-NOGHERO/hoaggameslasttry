<?php
session_start();
require_once('db.php');

if(isset($_POST['username']) && isset($_POST['password'])) {
    $db = new Db();
    $conn = $db->getConnection();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare('SELECT * FROM users WHERE nom = :username AND password = :password');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: forum.php');
        // exit();
    } else {
        $error = 'Nom d\'utilisateur ou mot de passe incorrect';
        echo $error;
    }
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
    <?php if (!isset($_SESSION['user_id'])): ?> <!-- Ajoutez cette ligne -->
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" class="login-form">
        <div class="containeri">
            <img src="images/HGlogoSquare.png" alt="Image de l'application">
        <div class="animated-text">Hoaggames</div>
        </div>
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="username" required>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" required>
            <button type="submit" class="custom-button">Continuer</button>
        </form>
        <div class="lien_inscription">
        <p>Pas encore inscrit ? <a href="inscription.php">Inscrivez-vous ici</a>.</p>
        </div>
    <?php endif; ?> <!-- Ajoutez cette ligne -->
</body>
</html>