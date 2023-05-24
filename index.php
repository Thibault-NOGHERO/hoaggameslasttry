<?php
session_start();
require_once "config.php"; 
require_once "db.php";

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    // Si l'utilisateur est déjà connecté, redirigez-le directement vers la page forum.php
    header('Location: forum.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-4Kt4HkFKzYX9PONoivP8S66xw39ZiD98l2zu4v/G8jtkWz68AZrwHfJ9G/MCv8gjWmZLDtLJQmPX7RjAHNQf5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script src="script.js"></script>
  <title>Hoaggames</title>
</head>

<body>
  <div class="page-accueil">
    <div class="content-container">
      <img src="images/img-appli.png">
      <div class="main-content">
        <h1>Hoaggames l'app des glory kill</h1>
        <p>Lancez-vous maintenant !</p>
      </div>
    </div>
  </div>
  <div class="login-form2">
  <div class="footer-button">
    <a href="login.php" class="custom-button">Continuer</a>
  </div>
</div>
</body>

</html>
