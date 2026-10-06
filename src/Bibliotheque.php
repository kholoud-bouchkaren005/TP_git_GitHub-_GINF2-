<?php

/**
 * Catalogue des livres de la bibliothèque, indexé par ISBN.
 */
class Bibliotheque
{
    /** @var array<string, Livre> */
    private array $livres = [];

    /** Ajoute un livre au catalogue. Un ISBN déjà présent est remplacé. */
    public function ajouter(Livre $l): void
    {
        $this->livres[$l->getIsbn()] = $l;
    }

    /** Retourne le livre correspondant à l'ISBN, ou null s'il est absent. */
    public function trouver(string $isbn): ?Livre
    {
        return $this->livres[$isbn] ?? null;
    }

    /** @return Livre[] */
    public function tous(): array
    {
        return array_values($this->livres);
    }

    public function compter(): int
    {
        return count($this->livres);
    }

    /** Recherche le mot dans les titres et les auteurs, sans distinction de casse. @return Livre[] */
    public function rechercher(string $mot): array
    {
        $mot = trim($mot);
        if ($mot === '') {
            return [];
        }

        return array_values(array_filter(
            $this->livres,
            static function (Livre $livre) use ($mot): bool {
                return stripos($livre->getTitre(), $mot) !== false
                    || stripos($livre->getAuteur(), $mot) !== false;
            }
        ));
    }
}
