<?php
//session_start();

use App\Authentification\SessionManager;
use App\Utils\Template;

error_reporting(E_ALL);
ini_set('display_errors', 1);

//echo 'user';
//var_dump($user);
// Vérifier si l'utilisateur est connecté
/* if (!isset($_SESSION->user)) {
    header("Location: login.php");
    exit();
} */

// Récupération des infos utilisateur depuis la session
//$user = $_SESSION->user;
?>

<section class="container">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f3f4f6;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 40px auto;
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, .1);
    }

    h2 {
      text-align: center;
      color: #333;
    }

    .info {
      margin: 15px 0;
      padding: 12px;
      background: #f9fafb;
      border-radius: 8px;
    }

    label {
      font-weight: bold;
    }

    input,
    textarea {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      border-radius: 8px;
      border: 1px solid #ddd;
    }

    button {
      margin-top: 15px;
      padding: 12px;
      width: 100%;
      background: #1d4ed8;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
    }

    button:hover {
      background: #2563eb;
    }

    .logout {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: red;
    }
  </style>
  <h2>Mon Profil</h2>

  <div class="info">
    <p><label>Nom d’utilisateur :</label> <?= htmlspecialchars($_SESSION['user']['nom']) . ' ' . htmlspecialchars($_SESSION['user']['prenom']); ?></p>
    <p><label>Email :</label> <?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
    <p><label>Rôle :</label> <?php echo htmlspecialchars($_SESSION['user']['role']); ?></p>
  </div>

  <form method="POST" action="update_profile.php">
    <label for="bio">Petite bio / humeur :</label>
    <textarea id="bio" name="bio" rows="4" placeholder="Écris un petit mot..."></textarea>

    <label for="password">Changer de mot de passe :</label>
    <input type="password" id="password" name="password" placeholder="Nouveau mot de passe">

    <button type="submit" onclick="logout()">Mettre à jour</button>
    <button id="logout" class="logout" >Se déconnecter</button>
  </form>

  
  <script>
    document.getElementById("logout").addEventListener("click", function() {
      fetch("/php/tastyfood_mvc/app/public/logout")
        .then(() => {
          window.location.href = "/php/tastyfood_mvc/home";
        });
    });
  </script>
</section>