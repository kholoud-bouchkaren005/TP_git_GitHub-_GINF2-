<?php
class Membre
{
    private int $id;
    private string $nom;
    private array $emprunts = [];
    private const MAX_EMPRUNTS = 3;

    public function __construct(int $id, string $nom)
    {
        $this->id = $id;
        $this->nom = $nom;
    }

    public function getId(): int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function getEmprunts(): array { return $this->emprunts; }


  
}