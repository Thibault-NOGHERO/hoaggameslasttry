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

// Vérifier si le formulaire de modification de profil a été soumis
if (isset($_POST['submit_profile'])) {
    $nom = $_POST['nom'];
    $bio = $_POST['bio'];

    // Mettre à jour les informations de l'utilisateur dans la base de données
    updateUserInfo($user_id, $nom, $bio);

    // Actualiser la page pour afficher les nouvelles informations
    header('Location: user_profile.php?user_id=' . $user_id);
    exit;
} else {
    // Récupérer les informations de l'utilisateur depuis la base de données
    $user_info = getUserInfo($user_id);
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

function getUserInfo($user_id)
{
    require_once('db.php');

    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('SELECT nom, bio FROM users WHERE id = :user_id');
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateUserInfo($user_id, $nom, $bio)
{
    require_once('db.php');

    $db = new Db();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('UPDATE users SET nom = :nom, bio = :bio WHERE id = :user_id');
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':bio', $bio);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
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
    <title>Mon profil</title>
</head>

<body>
    <header>
        <div class="user-info">
            <img src="uploads/<?php echo $user_image; ?>" alt="Image utilisateur">
            <span class="username"><?php echo $user_name; ?></span>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

            <a href="logout.php">Se déconnecter</a>
        </div>
    </header>
    <main class="modifier_profil">
        <h1>Mon profil</h1>
        <form class="profile-form" action="" method="post" enctype="multipart/form-data">
            <label class="form-label" for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $user_info['nom']; ?>">
            <label class="form-label" for="bio">Bio :</label>
            <textarea id="bio" name="bio"><?php echo $user_info['bio']; ?></textarea>
            <label class="form-label">Image de profil :</label>
            <input type="file" id="image" name="image">
            <label class="form-label">Valider:</label>
            <input type="submit" name="update_profile" value="Enregistrer">
        </form>
    </main>


    <?php
    // Vérifier si le formulaire de mise à jour du profil a été soumis
    if (isset($_POST['update_profile'])) {
        // Récupérer les valeurs des champs du formulaire
        $nom = $_POST['nom'];
        $bio = $_POST['bio'];

        // Vérifier si une nouvelle image de profil a été envoyée
        if ($_FILES['image']['name'] != '') {
            $image = $_FILES['image']['name'];
            $tmp_image = $_FILES['image']['tmp_name'];
            $image_size = $_FILES['image']['size'];

            // Vérifier le type et la taille de l'image
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
            $file_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

            if (!in_array($file_extension, $allowed_extensions)) {
                echo 'Le type de fichier n\'est pas autorisé.';
                exit;
            }

            // Supprimer l'ancienne image de profil
            $old_image = $user_info['image'];
            if ($old_image != '') {
                unlink('uploads/' . $old_image);
            }

            // Télécharger la nouvelle image de profil
            $new_image = uniqid() . '.' . $file_extension;
            move_uploaded_file($tmp_image, 'uploads/' . $new_image);
        } else {
            // Conserver l'ancienne image de profil
            $new_image = $user_info['image'];
        }

        // Mettre à jour les informations de profil de l'utilisateur dans la base de données
        $db = new Db();
        $conn = $db->getConnection();

        $stmt = $conn->prepare('UPDATE users SET nom = :nom, bio = :bio, image = :image WHERE id = :user_id');
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':bio', $bio);
        $stmt->bindParam(':image', $new_image);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        // Actualiser la page pour afficher les nouvelles informations de profil
        header('Location: user_profile.php?user_id=' . $user_id);
        exit;
    }
    ?>
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