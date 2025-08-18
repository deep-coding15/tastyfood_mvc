<?php
namespace App\Models\Repositories;
use App\Models\Base\SQL;

use App\Models\Classes\Plat;

class PlatModele extends SQL{
    public function __construct()
    {
        parent::__construct('plats', 'id');
    }
    
    /**
     * Liste les Plats présents en base de données
     * @param int $limit
     * @param int $page
     * @param string  $type = [
     * - 1 Accompagnement
     * - 2 Desserts
     * - 3 Entrees
     * - 4 Plat de resistance
     * - 5 Boissons
     * - 6 Default
     * ]
     * @return Plat[]
     */
    public function liste(int $limit = PHP_INT_MAX, int $page = 0, int $type = 6)
    {
        if($type !== 6) {
            $query = "SELECT * FROM plats WHERE deleted_at is null and type=:type  LIMIT :limit,:offset; ";
            $stmt = SQL::getPdo()->prepare($query);
                $stmt->execute([
                    ":limit" => $limit * $page, 
                    ":type" => $type,
                    ":offset" => $limit
                ]);
        }
        else{
            $query = "SELECT * FROM plats WHERE deleted_at is null  LIMIT :limit,:offset; ";
            $stmt = SQL::getPdo()->prepare($query);       
            $stmt->execute([
                ":limit" => $limit * $page, 
                ":offset" => $limit
            ]);
        }
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Plat::class);
    }
    public function getPlats(){
        $query = "SELECT * FROM plats WHERE deleted_at is not null";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Plat::class);
    }
    public function getPlatsByTypeName(string $type): array {
        $query = "SELECT * FROM plats WHERE type = :type";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([
            'type' => $type
        ]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, Plat::class);
    }
    public function getById($platId){
        /* $query = "SELECT * FROM plats WHERE id = ?";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([$platId]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Plat::class);
        return $stmt->fetch(); */
        return $this->getOne($platId);
    }

    /**
     * Retourne une liste de client correspondant au critère de recherche
     * @param string $keyword
     * @param int $limit
     * @param int $page
     * @return Plat[]
     */
    public function recherche(string $keyword = "", int $limit = PHP_INT_MAX, int $page = 0): array
    {
        $query = "SELECT * FROM plats p 
            Left outer Join type_plat tp on p.type = tp.type_plat_id
            WHERE nom LIKE :nom LIMIT :limit,:offset;";

        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([
            ":nom" => "%$keyword%",
            ":limit" => $limit * $page,
            ":offset" => $limit
        ]);

        return $stmt->fetchAll(\PDO::FETCH_CLASS, Plat::class);
    }

    /**
     * Ajoute un nouveau client en base de données
     * @param Plat $unClient
     * @return bool|string
     */
    public function addToDB(Plat $plat): bool|string
    {
        $query = "INSERT INTO plats (nom, description, img, prix, type) VALUES (?, ?, ?, ?, ?)";
        $stmt = SQL::getPdo()->prepare($query);
        $stmt->execute([
            $plat->getNom(), $plat->getDescription(), 
            $plat->getImg(), $plat->getPrix(),
            $plat->getType()
        ]);

        return $this->getPdo()->lastInsertId();
    }

    
}