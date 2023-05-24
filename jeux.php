<?php
session_start();
include_once('db.php');
$pdo = new PDO('mysql:host=localhost;dbname=haoggameslasttry;charset=utf8', 'root', '');
// $pdo = new PDO('mysql:host=sql201.epizy.com;dbname=epiz_33988385_mobi;charset=utf8', 'epiz_33988385', '6bDY3000NZky');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Supprimer un jeu de la table appartient
if (isset($_POST['action']) && isset($_POST['game_id'])) {
    $game_id = $_POST['game_id'];
    $user_id = $_SESSION['user_id'];
    if ($_POST['action'] === 'remove') {
        $stmt = $pdo->prepare("DELETE FROM appartient WHERE id_game = ? AND user_id = ?");
        $stmt->execute([$game_id, $user_id]);
    }
}

// Récupérer les jeux et les données de la table game et appartient
$query = $pdo->query('SELECT game.*, appartient.date_ajout FROM game INNER JOIN appartient ON game.id = appartient.id_game WHERE appartient.user_id = ' . $_SESSION['user_id']);
$games = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mes jeux</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <h1>Jeux !</h1>
    <?php foreach ($games as $game) : ?>
        <div class="grid-item">
            <h2><?= $game['name'] ?></h2>
            <img src="<?= 'images/' . $game['name'] . '.png' ?>" alt="<?= $game['description'] ?>">
            <p><?= $game['description'] ?></p>
            <p>Date de sortie : <?= $game['annee_de_sortie'] ?></p>
            <p>Date d'ajout : <?= $game['date_ajout'] ?></p>
            <form method="post">
                <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
                <button type="submit" name="action" value="remove">Supprimer</button>
            </form>
        </div>
        <footer>
    <nav>
      <ul>
        <li><a href="forum.php"><i class="fas fa-home"></i></a></li>
        <li><a href="amis.php"><i class="fas fa-user"></i></a></li>
        <!-- <li><a href="game.php"><i class="fas fa-gamepad"></i></a></li> -->
       <li><a href="<?php echo isset($_SESSION['user_id']) ? 'game.php' : 'login.php'; ?>">
    <i class="fas fa-gamepad"></i></a></li>

        <li><a href="chat.php"><i class="fas fa-envelope"></i></a></li>
        <li><a href="#"> <i class="fas fa-cog"></i></a></li>
      </ul>
    </nav>
  </footer>
    <?php endforeach ?>
</body>
</html>
