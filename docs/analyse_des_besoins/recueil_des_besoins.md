## I./ Chapitre 1 – Objectif et portée

Le projet est de mettre en place une plateforme web proposant divers services de calculs, sa portée reste pédagodique et il n'est pas destiné a être mis en ligne.  
Ses objectifs généraux sont de respecter les besoins du client expliciter dans le cahier des charges.

Les profils intervenants dans le projet seront :
- les visiteurs
- les utilisateurs
- l'administrateur web
- l'administrateur système

## II./ Chapitre 2 – Terminologie employée / Glossaire



## III./ Chapitre 3 – Les cas d’utilisation

Le diagramme comprenant les acteurs principaux et leurs objectifs est dans le dossier images

### Cas d'utilisation système : 

| Cas d'utilisation :   | Créer compte utilisateur                                                                                                                                                                                                                                                      |
|-----------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Description           | Un visiteur veut créer un compte utilisateur pour accéder aux modules de calculs                                                                                                                                                                                              |
| Portée                | Système ⬛                                                                                                                                                                                                                                                                     |
| Niveau                | Utlisateur 🌊                                                                                                                                                                                                                                                                 |
| Acteur Principale     | Visiteur                                                                                                                                                                                                                                                                      |                                                                                |
| Intervenants          | Visiteur, site web, base de données                                                                                                                                                                                                                                           |
| Scénario nominal      | 1. Le visiteur se rends sur le formulaire d'inscription <br/> 2. Le visiteur rentre ses informations <br/> 3. Le visiteur valide le capcha <br/> 4.Une demande de création de compte est envoyés à la base de données <br/> 5. Une confirmation est affiché au visiteur <br/> |
| Scénario alternatifs  |                                                                                                                                                                                                                                                                               |
| Scénario exceptionnel |                                                                                                                                                                                                                                                                               |
| Post - Conditions     | Un compte utilisateur a été crée.                                                                                                                                                                                                                                             |
| Contraintes           |                                                                                                                                                                                                                                                                               |


## IV./ Chapitre 4 – La technologie employée

Il existe des exigences techniques pour ce projet tel que :
- L'utilisation d'un serveur Apache
- L'utilisation d'un serveur SQL
- Héberger les serveurs sur le RaspberryPi mis a disposition par l'IUT
- Développez le site et ses modules en PHP

