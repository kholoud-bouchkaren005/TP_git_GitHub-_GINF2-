<?php

$livre = new Livre('9782100545261', 'Algo', 'Cormen');

verifier($livre->estDisponible(), 'Un nouveau livre est disponible');

$livre->emprunter();
verifier(!$livre->estDisponible(), 'Après emprunt, le livre est indisponible');

$livre->rendre();
verifier($livre->estDisponible(), 'Après retour, le livre est disponible');

try {
    $livre->rendre();
    verifier(false, 'Exception attendue au retour d\'un livre déjà disponible');
} catch (Exception $e) {
    verifier(true, 'Exception au retour d\'un livre déjà disponible');
}

try {
    new Livre('123', 'Titre', 'Auteur');
    verifier(false, 'Exception attendue pour un ISBN invalide');
} catch (InvalidArgumentException $e) {
    verifier(true, 'Exception pour un ISBN invalide');
}