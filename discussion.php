<?php
session_start();
require_once 'config.php';
require_once 'db.php';

if (!isset($_GET['id'])) {
    header('Location: forum.php');
    exit;
}

$id_news = $_GET['id'];

try {
    $db = new Db();
    $pdo = $db->getConnection();

    // Récupérer les détails de l'article
    $stmt = $pdo->prepare("SELECT * FROM news WHERE id = ?");
    $stmt->execute([$id_news]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Gérer l'exception ici, par exemple en affichant un message d'erreur
    echo "Erreur : " . $e->getMessage();
}

// Récupérer les commentaires
try {
    $stmt = $pdo->prepare("SELECT * FROM comments WHERE id_news = ? ORDER BY date ASC");
    $stmt->execute([$id_news]);
    $commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des commentaires : " . $e->getMessage();
    exit();
}
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Discussion - <?php echo $article['title']; ?></title>
</head>

<body>
    <header>
        <h1><?php echo $article['title']; ?></h1>
        <form action="logout.php" method="post">
            <button type="submit">Se deconnecter</button>
        </form>
    </header>
    <main>
        <div class="discussion-container">
            <img src="<?php echo $article['image_path']; ?>" alt="Image de l'article">
            <p><?php echo $article['contenu']; ?></p>
            <h2>Commentaires</h2>
            <!-- Affichage des commentaires -->
            <?php foreach ($commentaires as $commentaire) { ?>
                <div class="commentaire">
                    <p><?php echo $commentaire['content']; ?></p>
                    <p>Date: <?php echo $commentaire['date']; ?></p>
                </div>
            <?php } ?>

            <?php if (isset($error)) { ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php } ?>

            <h3>Ajouter un commentaire</h3>

            <form action="ajouter_commentaire.php?id=<?php echo $id_news; ?>" method="post">
                <button type="submit">Commenter</button>
            </form>
            <a href="forum.php" class="button">Retour au forum</a>
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