<?php
session_start();
require_once 'config.php';
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $contenu = $_POST['contenu'];
    $id_users = $_SESSION['user_id'];
    $date = date('Y-m-d H:i:s');

    $image = $_FILES['image'];
    $image_path = '';

    if ($image['error'] === UPLOAD_ERR_OK) {
        $image_ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $image_name = uniqid() . '.' . $image_ext;
        $upload_dir = 'images/';
        $image_path = $upload_dir . $image_name;

        if (!move_uploaded_file($image['tmp_name'], $image_path)) {
            $error = 'Erreur lors du téléchargement de l\'image';
            $image_path = '';
        }
    }

    try {
        $db = new Db();
        $pdo = $db->getConnection();
        $stmt = $pdo->prepare('INSERT INTO news (title, contenu, date, id_users, image_path) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$title, $contenu, $date, $id_users, $image_path]);
        header('Location: forum.php');
        exit;
    } catch (PDOException $e) {
        $error = 'Erreur lors de la création du nouveau sujet: ' . $e->getMessage();
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
    <title>Créer un nouveau sujet de discussion</title>
</head>
<body>
<h1>Créer un nouveau sujet de discussion</h1>
<?php if (isset($error)) { ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php } ?>
<form action="nouveau_sujet.php" method="post" enctype="multipart/form-data">
    <label for="title">Titre:</label>
    <input type="text" name="title" id="title" required>
    <br>
    <label for="contenu">Contenu:</label>
    <textarea name="contenu" id="contenu" required></textarea>
    <br>
    <label for="image">Image:</label>
    <input type="file" name="image" id="image">
    <br>
    <input type="submit" value="Créer un nouveau sujet">
</form>
</body>
</html>