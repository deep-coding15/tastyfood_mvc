<?php

namespace App\Models\Base;
use DateTime;
use PDO;

class SQL implements IDatabase
{
    protected $tableName = '';
    protected $primaryKey = '';

    /**
     * @var $pdo PDO|null
     */
    private static ?\PDO $pdo = null;

    /**
     * @return PDO|null
     */
    public static function getPdo(): PDO|null
    {
        if (SQL::$pdo == null) {
            SQL::$pdo = Database::connect();
        }
        return self::$pdo;
    }

    /**
     * @param string $tableName Nom de la table
     * @param string $primaryKey Clé primaire de la table
     */
    function __construct(string $tableName, string $primaryKey = 'id')
    {
        $this->tableName = $tableName;
        $this->primaryKey = $primaryKey;
    }

    /**
     * Retourne l'ensemble des enregistrements présent en base de données (pour la table $tableName)
     * @return array|null
     */
    public function getAll(): array|null
    {
        $stmt = SQL::getPdo()->prepare("SELECT * FROM {$this->tableName} Where deleted_at is null;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Permet la récupération d'un enregistrement en base de données
     * @param string $id
     * @return \stdClass|null
     */
    public function getOne(string $id): \stdClass|null
    {
        $stmt = SQL::getPdo()->prepare("SELECT * FROM {$this->tableName} WHERE {$this->primaryKey} = ? LIMIT 1");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Supprime l'enregistrement $id dans la table $tableName
     * @param $id
     * @return bool
     */
    public function deleteOne(string $id): bool
    {
        $date = date("Y-m-d H:i:s");
        //$date = (new DateTime('Y-m-d H:i:s'))->format('Y-M-d H:i:s');
        $stmt = SQL::getPdo()->prepare("UPDATE {$this->tableName} SET deleted_at=:deleted_at WHERE {$this->primaryKey} = :id");
        //$stmt = SQL::getPdo()->prepare("DELETE FROM {$this->tableName} WHERE {$this->primaryKey} = ? LIMIT 1");
        return $stmt->execute([
            ':deleted_at' => $date,
            ':id' => $id
        ]);
    }

    /**
     * Permet la mise à jour de l'ensemble des champs passée en paramètre dans $data pour l'enregistrement à $id.
     * @param $id
     * @param array $data
     * @return bool
     */
    public function updateOne(string $id, array $data = array()): bool
    {
        $query = "UPDATE {$this->tableName} SET ";

        foreach ($data as $columnName => $columnValue) {
            $query .= $columnName . " = :$columnName, ";
        }
        $query = rtrim($query, ", ");

        $query .= " WHERE {$this->primaryKey} = :id";

        $stmt = SQL::getPdo()->prepare($query);
        return $stmt->execute(array_merge(["id" => $id], $data));
    }


    /**
     * Permet l'insertion d'un enregistrement dans la table $tableName.
     * @param array $data
     * @return bool
     */
    public function insertOne(array $data = array()): bool
    {
        $query = "INSERT INTO {$this->tableName} (";
        $query .= implode(", ", array_keys($data)) . ") VALUES (";
        $query .= ":" . implode(", :", array_keys($data)) . ")";

        $stmt = SQL::getPdo()->prepare($query);
        return $stmt->execute($data);
    }


    /**
     * Permet de récupérer le nom de la table
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * Permet de récupérer la clé primaire de la table
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }
}