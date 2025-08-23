<?php

namespace App\Models\Repositories;

use App\Authentification\Auth;
use App\Authentification\SessionManager;
use App\Models\Base\SQL;
use App\Models\Classes\Utilisateur;

use Exception;


class UtilisateurModele extends SQL
{
  private Auth $auth;
  
  public function __construct()
  {
    parent::__construct('utilisateur', 'id');
    $this->auth = new Auth();
  }
  /**
   * Liste les utilisateurs présents en base de données
   * @param int $limit
   * @param int $page
   * @return Utilisateur[]
   */
  /*  */

  public function liste(int $page = 0, int $limit = 10)
  {
    $query = "SELECT * FROM {$this->tableName} 
              ORDER BY login ASC 
              LIMIT :limit";
    // OFFSET :offset";

    $stmt = $this->getPdo()->prepare($query);

    // Calcul offset correct
    $offset = $page * $limit;

    // Bind en entiers (important !)
    $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
    //$stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);

    $stmt->execute();
    //$menus = $stmt->fetchAll(\PDO::FETCH_OBJ);
    //$plats = array_map('getPlatsPrixByMenuId', $menus);
    /* foreach($menus as $key => $menu){

        } */
    //var_dump($menus);
    return $stmt->fetchAll();
  }
  /**
   * Retourne une liste de client correspondant au critère de recherche
   * @param string $keyword
   * @param int $limit
   * @param int $page
   * @return Utilisateur[]
   */
  public function recherche(string $keyword = "", int $limit = PHP_INT_MAX, int $page = 0): array
  {
    $query = "SELECT * FROM utilisateur WHERE nom LIKE :nom OR prenom like :prenom OR email like :email LIMIT :limit,:offset;";

    $stmt = SQL::getPdo()->prepare($query);
    $stmt->execute([
      ":nom" => "%$keyword%",
      ":prenom" => "%$keyword%",
      ":email" => "%$keyword%",
      ":limit" => $limit * $page,
      ":offset" => $limit
    ]);

    return $stmt->fetchAll(\PDO::FETCH_CLASS, Utilisateur::class);
  }

  /**
   * Ajoute un nouveau client en base de données
   * @param Utilisateur $unClient
   * @return bool|string
   */
  public function creerClient(Utilisateur $unClient): bool|string
  {
    $query = "INSERT INTO utilisateur (id, nom, prenom, email, telephone) VALUES (null, ?, ?, ?, ?)";
    $stmt = SQL::getPdo()->prepare($query);
    $stmt->execute([$unClient->getNom(), $unClient->getPrenom(), $unClient->getEmail(), $unClient->getTelephone()]);

    return $this->getPdo()->lastInsertId();
  }

  public function getByClientId($clientId)
  {
    $stmt = $this->getOne($clientId);
    /* $query = "SELECT * FROM utilisateur WHERE id = ?";
    $stmt = SQL::getPdo()->prepare($query);
     */
    /* $stmt->execute([$clientId]);
    $stmt->setFetchMode(\PDO::FETCH_CLASS, Utilisateur::class);
    return $stmt->fetch(); */
    return $stmt;
  }

  function genererLogin($prenom, $nom)
  {
    // Nettoyage de l’entrée : suppression des espaces, accents, etc.
    $prenom = strtolower(self::supprimerCaracteresSpeciaux($prenom));
    $nom = strtolower(self::supprimerCaracteresSpeciaux($nom));

    // Création du login : initiale du prénom + nom
    $login = substr($prenom, 0, 1) . $nom;

    return $login;
  }
  function supprimerCaracteresSpeciaux($texte)
  {
    $texte = iconv('UTF-8', 'ASCII//TRANSLIT', $texte); // Enlève les accents
    $texte = preg_replace('/[^a-zA-Z0-9]/', '', $texte); // Enlève caractères spéciaux
    return $texte;
  }
  function genererLoginUnique($prenom, $nom, $conn)
  {
    $baseLogin = self::genererLogin($prenom, $nom);
    $login = $baseLogin;
    $i = 1;

    // Vérifie dans la base si le login existe déjà
    while (self::loginExiste($login)) {
        $login = $baseLogin . $i;
        $i++;
    }
    return $login;
  }

  function loginExiste($login)
  {
      $sql = "SELECT COUNT(*) FROM utilisateur WHERE login = ?";
      $stmt = $this->getPdo()->prepare($sql, [$login]);
      return $stmt->fetchColumn() > 0;
  }
  /**
   * Permmet d'inserer un utilisateur dans la base de donnees lorsqu'on clique sur le formulaire de login
   * @param array $postData : table renvoyé par le formulaire
   * @return void
   */
  public function login(array $postData): array|bool
  {
    /* if($_SERVER['REQUEST_METHOD'] === "POST"){
      $postData = $_POST;
    } */
    if (
        isset($postData["email"], $postData["password"]) 
        && trim($postData["password"]) !== ""
        && trim($postData["email"]) !== ""
    ) {
        $email = trim($postData['email'] ?? '');
        $password = trim($postData['password'] ?? '');
        /* echo 'email'; var_dump($email);
        echo 'password'; var_dump($password); */
    }
    try 
    {
      //$result = $this->auth->login($email, $password);
      $result = $this->validerLogin($email, $password);
      $message = "Vos informations de connection sont corrects. 
                    Votre compte est maintenant actif";
      return ['user' => $result, "message" => $message];
    } catch (Exception $exception) {
        $message = "Erreur : " . $exception->getMessage();
        //var_dump($message);
        return false;
    }
    
        /* $stripe = new \Stripe\StripeClient($_ENV['STRIPE_SECRET_API_KEY']);

        $customer = $stripe->customers->create([
            'name' => 'Jenny Rosen',
            'email' => 'jennyrosen@example.com',
        ]); */
        
      //init session message
      //$this->sessionManager->setMessage($message);
      //SecureSession::showMessage($message); 
  }  

  function validerLogin(string $email, string $password)
  {
    //$_sessionManager = SessionManager::getInstance();
    // Vérifie que les paramètres ne sont pas vides
    if (empty($email) || empty($password)) {
        throw new Exception("Email ou mot de passe manquant.");
    }

    $sql = "SELECT * FROM utilisateur WHERE email = :email";
    $stmt = $this->getPdo()->prepare($sql);
    //var_dump($stmt);
    $stmt->execute([":email" => $email]);
    //var_dump($stmt);
    $user = $stmt->fetch(\PDO::FETCH_ASSOC);

    //var_dump($user);
    if (!$user) {
        throw new Exception("Aucun utilisateur trouvé avec cet email.");
    }

    if (!password_verify($password, $user['password'])) {
        throw new Exception('le mot de passe n\'est pas valide');
    }
    SessionManager::set('user', 
      [
          'id'     => $user['id'],
          'email'  => $user['email'],
          'role'   => $user['role'],
          'nom'    => $user['nom'],
          'prenom' => $user['prenom'],
      ]
    );
    
    // Active le compte uniquement s’il n'est pas déjà actif
    if ((int)$user['is_active'] === 0) {
        $sqlVerify = "UPDATE utilisateur SET is_active = 1 WHERE email = :email";
        $this->getPdo()->prepare($sqlVerify, [":email" => $email]);
    }
    //echo 'user in valider signup';
    //var_dump($user);
    /* $_SESSION['ID'] = $user['id_utilisateur'];
    $_SESSION['UTILISATEUR'] = $user;
      *///$_sessionManager->initSession($user['role'], $user);
    //var_dump($this->sessionManager->getSession()->get('UTILISATEUR'));
    /* echo 'user in session valider signup';
    var_dump($_SESSION['UTILISATEUR']);
      */
    //var_dump($user);
    return $user;
  } 
}