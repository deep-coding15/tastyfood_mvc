<?php
namespace App\Models\Classes;
use DateTime;

class Client  extends Entite{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $telephone;
    private $createdAt;

    public function __construct() {} // vide pour PDO

    public function setId(int $id) { $this->id = $id; }
    public function setNom(string $nom) { $this->nom = $nom; }
    public function setPrenom(string $prenom) { $this->prenom = $prenom; }
    public function setEmail(string $email) { $this->email = $email; }
    public function setTelephone(string $tel) { $this->telephone = $tel; }
    public function setCreatedAt(string $date) { $this->createdAt = new DateTime($date); }
}
