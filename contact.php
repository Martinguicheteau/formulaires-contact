<?php
class contact {
    private $id;
    private $nom;
    private $prenom;
    private $telephone;
    private $mail;
    
    public function __construct(int $id, string $nom, string $prenom, string $telephone, string $mail) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $id;
        $this->telephone = $telephone;
        $this->mail = $mail;
    }
   
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
    public function getPrenom(): int
    {
        return $this->prenom;
    }
    public function setPrenom(int $prenom): void
    {
        $this->prenom = $prenom;
    }
    public function getTelephone(): string
    {
        return $this->telephone;
    }
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }
    public function getMail(): string
    {
        return $this->mail;
    }
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }
    }