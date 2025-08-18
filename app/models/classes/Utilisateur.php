<?php
namespace App\Models\Classes;

use App\Utils\Constante;
use App\Utils\ConstanteServer;

/* class Utilisateur extends Entite
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $login;
    private string $password;
    private bool $is_active;
    private string $img_profil = '/default_profile_photo.jpg';
    private int $telephone;
    private \DateTime $created_at;
    private \DateTime $updated_at;
    private static int $nb_person = 0;

    public function __construct(int $id, string $firstname, string $lastname, string $email, string $login, string $password, bool $is_active, string $img_profil, int $telephone, \DateTime $created_at, \DateTime $updated_at)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
        $this->is_active = $is_active;
        $this->img_profil = ConstanteServer::base_url_img_profil() . $img_profil;
        //$this->img_profil = $img_profil;
        $this->telephone = $telephone;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        self::$nb_person++;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getFirstname(): string
    {
        return $this->firstname;
    }
    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getLogin(): string
    {
        return $this->login;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function is_active(): bool
    {
        return $this->is_active;
    }
    public function getImgProfil(): string
    {
        return $this->img_profil;
    }
    public function getTelephone(): string
    {
        return $this->telephone;
    }
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }
    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function setIsActive(bool $is_active): void
    {
        $this->is_active = $is_active;
    }
    public function setImgProfil(string $img_profil): void
    {
        $this->img_profil = $img_profil;
    }
    public function setTelephone(int $telephone): void
    {
        $this->telephone = $telephone;
    }
    public function setCreatedAt(\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }
    public function setUpdatedAt(\DateTime $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    /**
     * This functions return a complete path of the profile image for a specific person
     * @param string $img_profil the name of a file
     * @return string
     *
    public function getRealImgProfile(string $img_profil): string
    {
        return Constante::base_url() . '/data/Profile/Images/' . $img_profil;
    }
} */

    class Utilisateur extends Entite
    {
        private int $id;
        private string $nom;
        private string $prenom;
        private string $email;
        private string $login;
        private string $password;
        private bool $is_active;
        private string $img_profil = '/default_profile_photo.jpg';
        private ?int $telephone = null;
        private  $created_at;
        private  $updated_at;

        public function __construct() {} // vide pour PDO

        // Getters and Setters...
        public function getId(): int
        {
            return $this->id;
        }
        public function setId(int $id): void
        {
            $this->id = $id;
        }
        public function getNom(): string
        {
            return $this->nom;
        }
        public function setNom(string $nom): void
        {
            $this->nom = $nom;
        }
        public function getPrenom(): string
        {
            return $this->prenom;
        }
        public function setPrenom(string $prenom): void
        {
            $this->prenom = $prenom;
        }
        public function getEmail(): string
        {
            return $this->email;
        }
        public function setEmail(string $email): void
        {
            $this->email = $email;
        }
        public function getLogin(): string
        {
            return $this->login;
        }
        public function setLogin(string $login): void
        {
            $this->login = $login;
        }
        public function getPassword(): string
        {
            return $this->password;
        }
        public function setPassword(string $password): void
        {
            $this->password = $password;
        }
        public function isActive(): bool
        {
            return $this->is_active;
        }
        public function setIsActive(bool $is_active): void
        {
            $this->is_active = $is_active;
        }
        public function getImgProfil(): string
        {
            return $this->img_profil;
        }
        public function setImgProfil(string $img_profil): void
        {
            $this->img_profil = $img_profil;
        }
        public function getTelephone(): ?int
        {
            return $this->telephone;
        }
        public function setTelephone(int $telephone): void
        {
            $this->telephone = $telephone;
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
        /**
         * This functions return a complete path of the profile image for a specific person
         * @param string $img_profil the name of a file
         * @return string
         */
        public function getRealImgProfile(string $img_profil): string
        {
            return Constante::base_url() . '/data/Profile/Images/' . $img_profil;
        }
        
    }