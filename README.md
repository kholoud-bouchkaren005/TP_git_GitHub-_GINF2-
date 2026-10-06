# Biblio

Application PHP en ligne de commande permettant de gérer une bibliothèque.

## Groupe

- Étudiant A : Livre
- Étudiant B : Bibliotheque
- Étudiant C : Membre

## Description

L'application permet de gérer les livres, les membres et les emprunts.

## Contrat d'interface

### Livre
- getIsbn()
- getTitre()
- getAuteur()
- estDisponible()
- emprunter()
- rendre()

### Bibliotheque
- ajouter(Livre $l)
- trouver(string $isbn)
- tous()
- compter()
- rechercher(string $mot)

### Membre
- getId()
- getNom()
- emprunter(Livre $l)
- rendre(Livre $l)
- getEmprunts()