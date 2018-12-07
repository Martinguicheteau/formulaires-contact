<?php
class Book {
    private $id;
    private $name;
 //   private $id_membres;

    public function __construct(int $id, string $name) {
        $this->id = $id;
        $this->name = $name;
 //       $this->id_membres = $id_membres;
    }
   
    public function getId(): int
    {
        return $this->id;
    }
   
    public function setId(int $id): void
    {
        $this->id = $id;
    }
   
    public function getName(): string
    {
        return $this->name;
    }
    
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    
}