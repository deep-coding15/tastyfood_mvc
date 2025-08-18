<?php
namespace App\Models\Classes;

use App\Utils\Constante;
use DateTime;

class Plat extends Entite
{
    private int $id;
    private string $nom;
    private string $img;
    private string $description;
    private  $created_at;
    private  $updated_at;
    private  $deleted_at;
    private int $type;
    private float $prix;

    private static int $nb_plats = 0;

    /**
     * Summary of __construct
     * @param string $nom
     * @param string $img contient le chemin ou se trouve l'image du plat. Il est stocke dans le dossier upload qui se trouve dans le dossier data
     * @param int $type : entree, plat de resistance, accompagnements, desserts
     * @param float $prix
     */
    public function __construct()
    {}

    /*  // 🧹 Destructeur (facultatif)
    public function __destruct() {
        self::$nb_plats--;
        // Exemple : log ou nettoyage
        echo "Le plat '{$this->nom_plat}' a été supprimé.";
    } */

    //Setters && Getters
    // id
public function __get($property) {
    if (property_exists($this, $property)) {
        return $this->$property;
    }
}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    // nom
    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    // img
    public function getImg(): string
    {
        return $this->img;
    }

    public function setImg(string $img): void
    {
        $this->img = $this->getRealImg(). $img;
    }

    public function getRealImg()
    {
        return Constante::base_url() . '/app/data/Plats/Images/' ;
    }

    // description
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    // created_at
    public function getCreatedAt(): DateTime
    {
        return ($this->created_at instanceof DateTime) ? $this->created_at : new DateTime($this->created_at);
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at ? new DateTime($created_at) : new DateTime();
    }

    // updated_at
    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTime $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    // deleted_at
    public function getDeletedAt(): \DateTime
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(\DateTime $deleted_at): void
    {
        $this->deleted_at = $deleted_at;
    }

    // types
    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    // prix
    public function getPrix(): float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

    public static function getNombres()
    {
        return self::$nb_plats;
    }

    public function __toString()
    {
        return "Plat: {$this->nom}\n" .
            "Id: {$this->id}\n" .
            "Type: {$this->type}\n" .
            "Prix: {$this->prix} €\n" .
            "Description: {$this->description}\n" .
            "Image: {$this->img}\n" .
            "Created at: {$this->created_at->format('Y-m-d H:i:s')} \n" .
            "Updated at: {$this->updated_at->format('Y-m-d H:i:s')} \n" .
            "Deleted at: {$this->deleted_at->format('Y-m-d H:i:s')} \n";
    }
}