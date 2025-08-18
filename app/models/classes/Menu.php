<?php
namespace App\Models\Classes;

use DateTime;

class Menu extends Entite
{
    private int $id_menu;
    private string $nom_menu;
    private string $description;
    private float $prix_total;
    private bool $actif;
    private DateTime $created_at;
    private DateTime $updated_at;
    private ?DateTime $deleted_at;


    public function __construct(
        int $id_menu,
        string $nom_menu,
        string $description,
        float $prix_total,
        bool $actif = true,
        ?DateTime $created_at = null,
        ?DateTime $updated_at = null,
        ?DateTime $deleted_at = null
    ) {

        $dateTime = new DateTime();
        //$date = $dateTime->format('Y-m-d H:i:s');

        $this->id_menu = $id_menu;
        $this->nom_menu = $nom_menu;
        $this->description = $description;
        $this->prix_total = $prix_total;
        $this->actif = $actif;
        $this->created_at = $created_at ?? $dateTime;
        $this->updated_at = $updated_at ?? $dateTime;
        $this->deleted_at = $deleted_at ?? null;
    }
    public function getIdMenu(): int
    {
        return $this->id_menu;
    }

    public function setIdMenu(int $id_menu): void
    {
        $this->id_menu = $id_menu;
    }

    public function getNomMenu(): string
    {
        return $this->nom_menu;
    }

    public function setNomMenu(string $nom_menu): void
    {
        $this->nom_menu = $nom_menu;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrixTotal(): float
    {
        return $this->prix_total;
    }

    public function setPrixTotal(float $prix_total): void
    {
        $this->prix_total = $prix_total;
    }

    public function isActif(): bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): void
    {
        $this->actif = $actif;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTime $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    public function getDeletedAt(): ?\DateTime
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(?\DateTime $deleted_at): void
    {
        $this->deleted_at = $deleted_at;
    }

    public function __tostring()
    {
        return "Menu: {$this->nom_menu}\n" .
            "Id: {$this->id_menu}\n" .
            "Description: {$this->description}\n" .
            "Prix Total: {$this->prix_total}\n" .
            "Actif: {$this->actif}\n" .
            "Created at: {$this->created_at->format('Y-m-d H:i:s')} \n" .
            "Updated at: {$this->updated_at->format('Y-m-d H:i:s')} \n" .
            "Deleted at: {$this->deleted_at->format('Y-m-d H:i:s')} \n";
    }
}