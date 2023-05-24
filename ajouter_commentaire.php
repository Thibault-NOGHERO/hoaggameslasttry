<?php
session_start();
require_once 'config.php';
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['content']) && isset($_POST['id_news'])) {
        $content = $_POST['content'];
        $id_users = $_SESSION['user_id'];
        $id_news = $_POST['id_news'];
        $date = date('Y-m-d H:i:s');
        try {
            $db = new Db();
            $pdo = $db->getConnection();
            $stmt = $pdo->prepare('INSERT INTO comments (content, date, id_users, id_news) VALUES (?, ?, ?, ?)');
            $stmt->execute([$content, $date, $id_users, $id_news]);
            header('Location: discussion.php?id=' . $id_news);
            exit;
        } catch (PDOException $e) {
            $error = 'Erreur lors de l\'ajout du commentaire: ' . $e->getMessage();
        }
    } else {
        // La clé "content" ou "id_news" n'existe pas dans $_POST
        $error = 'Erreur lors de l\'ajout du commentaire: champs manquants.';
    }
}
if (!isset($_GET['id'])) {
    header('Location: forum.php');
    exit;
}

$id_news = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="custom.css">
  <script src="script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <title>commentaires - <?php echo $article['title']; ?></title>
</head>

<body>
<header>
  <form action="logout.php" method="post">
  <button type="submit">Se deconnecter</button>
</form>
</header>
<main>
<div class="discussion-container">
    <img src="images/HGlogoSquare.png">
<form action="ajouter_commentaire.php" method="post">
    <input type="hidden" name="id_news" value="<?php echo $id_news; ?>">
    <label for="content">Ajouter un commentaire:</label>
    <textarea name="content" id="content" required></textarea>
    <br>
    <input type="submit" value="Ajouter le commentaire">
    <a href="forum.php" class="button">Retour au forum</a>
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