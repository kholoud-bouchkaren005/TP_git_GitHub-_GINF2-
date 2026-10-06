<?php

$bibliotheque = new Bibliotheque();
$livreA = new Livre('978-1', 'Le Petit Prince', 'Antoine de Saint-Exupéry');
$livreB = new Livre('978-2', 'Les Misérables', 'Victor Hugo');

verifier($bibliotheque->compter() === 0, 'une bibliothèque vide contient zéro livre');
verifier($bibliotheque->tous() === [], 'tous retourne une liste vide au départ');
verifier($bibliotheque->trouver('978-1') === null, 'trouver retourne null si l’ISBN est absent');

$bibliotheque->ajouter($livreA);
$bibliotheque->ajouter($livreB);
verifier($bibliotheque->compter() === 2, 'ajouter enregistre les livres');
verifier($bibliotheque->trouver('978-1') === $livreA, 'trouver retourne le livre par ISBN');
verifier(count($bibliotheque->tous()) === 2, 'tous retourne les livres du catalogue');
verifier($bibliotheque->rechercher('prince') === [$livreA], 'rechercher trouve dans le titre sans distinguer la casse');
verifier($bibliotheque->rechercher('HUGO') === [$livreB], 'rechercher trouve dans le nom de l’auteur sans distinguer la casse');
verifier($bibliotheque->rechercher('inconnu') === [], 'rechercher retourne une liste vide sans correspondance');
verifier($bibliotheque->rechercher('   ') === [], 'rechercher ignore une requête vide');

$bibliotheque->ajouter(new Livre('978-1', 'Titre corrigé', 'Auteur corrigé'));
verifier($bibliotheque->compter() === 2, 'un ISBN déjà présent ne crée pas un doublon');
verifier($bibliotheque->trouver('978-1')->getTitre() === 'Titre corrigé', 'un livre ajouté avec le même ISBN remplace l’entrée existante');