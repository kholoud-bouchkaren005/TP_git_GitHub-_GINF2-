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
//Getters 
    public function getId(): int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function getEmprunts(): array { return $this->emprunts; }

 public function emprunter(Livre $l): void
    {
        if (count($this->emprunts) >= self::MAX_EMPRUNTS) {
            throw new Exception("Limite de " . self::MAX_EMPRUNTS . " livres atteinte");
        }
        $l->emprunter(); // lève une Exception si déjà emprunté
        $this->emprunts[$l->getIsbn()] = $l;
    }
  // function to return a book and remove it from the member's list of borrowed books
     public function rendre(Livre $l): void
    {
        if (!isset($this->emprunts[$l->getIsbn()])) {
            throw new Exception("Ce livre n'a pas été emprunté par ce membre");
        }
        $l->rendre();
        unset($this->emprunts[$l->getIsbn()]);
    }
}