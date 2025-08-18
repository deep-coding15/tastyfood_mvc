<?php
namespace App\Models\Classes;

use DateTime;
use InvalidArgumentException;

class Commande extends Entite
{
    private int $id_commande;
    private int $id_client;
    private DateTime $date_commande;
    private string $statut;
    private float $prix_unitaire;

    private static array $TYPE_AUTORISES = ['en_attente', 'en_cours', 'payee', 'livree', 'annulee'];


    // Liste blanche pour éviter les valeurs invalides

    public function __construct(int $id_commande = false, int $id_client, float $prix_unitaire, ?string $date_commande = null, string $status = 'en_cours')
    {
        if (!in_array($status, self::$TYPE_AUTORISES, true)) {
            throw new InvalidArgumentException("Statut invalide : $status");
        }
        if($id_commande !== false)
            $this->id_commande = $id_commande;
        $this->date_commande = new DateTime($date_commande);
        $this->id_client = $id_client;
        $this->prix_unitaire = $prix_unitaire;
        $this->statut = $status;

        // Récupérer tous les arguments
        //$args = func_get_args();

        // Appeler une autre méthode avec ces mêmes arguments
        //call_user_func_array([$this, 'addCommandeToDB'], $args);

        //$this->addCommandeToDB(...$args);
    }
    // --- GETTERS ---
    public function getIdClient(): int
    {
        return $this->id_client;
    }
    public function getPrixUnitaire(): float
    {
        return $this->prix_unitaire;
    }
    public function getStatut(): string
    {
        return $this->statut;
    }
    public function getDateCommande(): DateTime
    {
        return $this->date_commande;
    }
}