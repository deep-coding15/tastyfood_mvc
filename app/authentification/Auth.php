<?php

namespace App\Authentification;

use App\Models\Base\SQL;
use Exception;



class Auth extends SQL
{

  public function __construct()
  {
    parent::__construct("utilisateur", "id");
  }

  // 🔹 Connexion d'un utilisateur
  public function login(string $email, string $password): bool
  {
    $stmt = $this->getPdo()->prepare("SELECT id, email, password, role FROM {$this->tableName} WHERE email = :email LIMIT 1");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(\PDO::FETCH_ASSOC);

    if (!$user) {
      throw new Exception("Aucun utilisateur trouvé avec cet email.");
    }

    if (!password_verify($password, $user['password'])) {
      throw new Exception('le mot de passe n\'est pas valide');
    }

    if ($user && password_verify($password, $user['password'])) {
      // Enregistre en session
      $_SESSION['user'] = [
        'id'    => $user['id'],
        'email' => $user['email'],
        'role'  => $user['role']
      ];
      if ((int)$user['is_active'] === 0) {
        $sqlVerify = "UPDATE utilisateur SET is_active = 1 WHERE email = :email";
        $this->getPdo()->prepare($sqlVerify, [":email" => $email]);
      }
      return true;
    }
    return false;
  }

  // 🔹 Vérifie si un utilisateur est connecté
  public function isLoggedIn(): bool
  {
    return isset($_SESSION['user']);
  }

  // 🔹 Vérifie si c’est un admin
  public function isAdmin(): bool
  {
    return $this->isLoggedIn() && $_SESSION['user']['role'] === 'admin';
  }

  // 🔹 Récupérer l’utilisateur connecté
  public function getUser(): ?array
  {
    return $this->isLoggedIn() ? $_SESSION['user'] : null;
  }
  public function profile(): void {
        $user = SessionManager::get('user');
        if ($user) {
            echo "👤 Profil : {$user->username}, {$user->email}<br>";
        } else {
            echo "❌ Aucun utilisateur connecté.<br>";
        }
    }

  // 🔹 Déconnexion
  public function logout(): void
  {
    unset($_SESSION['user']);
    session_destroy();
    SessionManager::destroy();
    echo "🚪 Déconnexion réussie.<br>";
  }
}
