<?php
namespace App\Models\Repositories;
use App\Models\Base\SQL;
use App\Models\Classes\Utilisateur;

class UtilisateurModele extends SQL{
    public function __construct()
    {
        parent::__construct('utilisateur', 'id');
    }
    /**
     * Liste les utilisateurs présents en base de données
     * @param int $limit
     * @param int $page
     * @return Utilisateur[]
     */
    /*  */

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

    public function getByClientId($clientId): Utilisateur{
        $query = "SELECT * FROM utilisateur WHERE id = ?";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$clientId]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Utilisateur::class);
        return $stmt->fetch();
    }
}