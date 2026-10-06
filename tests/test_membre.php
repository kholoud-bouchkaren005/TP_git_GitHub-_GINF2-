<?php
$m = new Membre(1, 'Safae');
$l = new Livre('9782100545261', 'Algo', 'Cormen');

verifier($m->getNom() === 'Safae', 'Le nom du membre est correct');
$m->emprunter($l);
verifier(count($m->getEmprunts()) === 1, 'Un emprunt enregistré');
verifier(!$l->estDisponible(), 'Le livre est indisponible après emprunt');

$m->rendre($l);
verifier($l->estDisponible(), 'Le livre est disponible après retour');

// Limite de 3
$m2 = new Membre(2, 'Test');
for ($i = 0; $i < 3; $i++) {
    $m2->emprunter(new Livre('123456789' . $i, "T$i", 'A'));
}
try {
    $m2->emprunter(new Livre('1234567899', 'T4', 'A'));
    verifier(false, 'Exception attendue au 4e emprunt');
} catch (Exception $e) {
    verifier(true, 'Exception au 4e emprunt');
}