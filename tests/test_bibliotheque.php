
<?php

$bibliotheque = new Bibliotheque();
$livreA = new Livre('978-1', 'Le Petit Prince', 'Antoine de Saint-Exupéry');
$livreB = new Livre('978-2', 'Les Misérables', 'Victor Hugo');

verifier($bibliotheque->compter() === 0, 'une bibliothèque vide contient zéro livre');
verifier($bibliotheque->tous() === [], 'tous retourne une liste vide au départ');
verifier($bibliotheque->trouver('978-1') === null, 'trouver retourne null si l’ISBN est absent');

$bibliotheque->ajouter($livreA);
$bibliotheque->ajouter($livreB);