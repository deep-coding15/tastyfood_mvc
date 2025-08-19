<?php

namespace App\Models\Repositories;

use App\Models\Base\SQL;
use App\Utils\Template;

class MenuModele extends SQL
{
    public function __construct()
    {
        parent::__construct('menus', 'id');
    }
    public function liste(int $page = 0, int $limit = 10): array
    {
        $query = "SELECT * FROM {$this->tableName} 
              WHERE deleted_at IS NULL 
              ORDER BY updated_at DESC 
              LIMIT :limit OFFSET :offset";

        $stmt = $this->getPdo()->prepare($query);

        // Calcul offset correct
        $offset = $page * $limit;

        // Bind en entiers (important !)
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
   
    public function getPlatsPrixByMenuId($menu_id): array
{
    $query = "SELECT p.id, p.prix
        FROM plats p 
        JOIN menu_plats mp ON mp.id_plat = p.id
        JOIN menus m ON mp.id_menu = m.id
        WHERE m.id = :id
    ";

    $stmt = $this->getPdo()->prepare($query);
    $stmt->execute([
        ':id' => $menu_id
    ]);
    
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC); // garder dans $result
    
    $platModele = new PlatModele();
    $plats = [];
    $prixPlats = [];

    foreach ($result as $plat) {
        $platOne = $platModele->getOne($plat['id']); 
        $plats[] = $platOne;
        $prixPlats[] = $platOne->prix;
    }

    $prixTotal = $this->getPrixTotalByPrixPlatArray($prixPlats);
    return [
        "plats" => $plats,
        "prix_total" => $prixTotal
    ];
}


    private function getPrixTotalByPrixPlatArray(array $prix_plats)
    {
        $somme = 0;
        foreach ($prix_plats as $prix_plat) {
            $somme += $prix_plat;
        }
        return $somme;
    }
}