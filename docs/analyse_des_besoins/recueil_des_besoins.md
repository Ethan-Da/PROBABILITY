## I./ Chapitre 1 – Objectif et portée


Le projet consiste à mettre en place une plateforme web de calculs mathématiques. 
Son objectif général est l'apprentissage de bonnes méthodes de développements et le respect des besoins client expliciter dans le cahier des charges.

Le projet est encadré par Monsieur Hoguin, principalement pour la partie Web. La conception est encadré par Monsieur Djerroud. 
L'équipe de développement est constitué de : Maxence Arsène, Bloumkoum Camara, Roméo Leblond, Ethan Dangeul, Hazim-Rayan Marouan. 

Le projet sera limité au réseau de l'IUT de Vélizy. Sa portée reste pédagodique et il n'est pas destiné a être mis en ligne.


## II./ Chapitre 2 – Terminologie employée / Glossaire

**SAé** (Situation d'Apprentissage et d'Évaluation) : Projet permettant aux étudiants de mettre en pratique des compétences techniques et théoriques acquises durant l'année.

**RPI (Raspberry Pi)** : Ordinateur monocarte utilisé pour héberger le serveur web du projet et exécuter l'application développée.

## III./ Chapitre 3 – Les cas d’utilisation

Le diagramme comprenant les acteurs principaux et leurs objectifs est dans le dossier images

https://lucid.app/lucidchart/0396fa81-ce6c-4a1f-97a1-1d0d16478c6c/edit?viewport_loc=-505%2C106%2C2986%2C1398%2C.Q4MUjXso07N&invitationId=inv_54497026-5345-4f18-9af9-9367bdc4bf39

### Cas d'utilisation système : 

| Cas d'utilisation : | Créer compte utilisateur                                                                                                                                                                   |
|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Description         | Un visiteur veut créer un compte utilisateur pour accéder aux modules de calculs                                                                                                                |
| Portée              | Système ⬛                                                                                                                                                                                       |
| Niveau              | Utlisateur 🌊                                                                                                                                                                                   |
| Acteur Principale   | Visiteur                                                                                                                                                                                        |                                                                                |
| Scénario nominal    | 1. Le visiteur se rends sur le formulaire d'inscription <br/> 2. Le visiteur rentre ses informations <br/> 3. Le visiteur valide le capcha <br/>  4. Une confirmation est affiché au visiteur <br/> |
| Scénario alternatifs |                                                                                                                                                                                                 |
| Scénario exceptionnel |                                                                                                                                                                                                 |
| Post-Conditions     | Un compte utilisateur a été crée.                                                                                                                                                               |
| Contraintes         |                                                                                                                                                                                                 |



| Cas d'utilisation : | Se connecter                                                                                                                                                                                         |
|--------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Description        | Un visiteur veut se connecter a son compte utilisateur                                                                                                                                               |
| Portée             | Système ⬛                                                                                                                                                                                            |
| Niveau             | Utlisateur 🌊                                                                                                                                                                                        |
| Acteur Principale  | Visiteur                                                                                                                                                                                             |                                                                                |
| Scénario nominal   | 1. Le visiteur se rends sur le formulaire de connexion <br/> 2. Le visiteur rentre ses informations <br/> 3. Le visiteur valide <br/> 4. Une confirmation de connexion est affiché au visiteur <br/> |
| Scénario alternatifs|                                                                                                                                                                                                      |
| Scénario exceptionnel|                                                                                                                                                                                                      |
| Pré-condition      | Il existe un compte utilisateur correspondant aux informations du visiteur.                                                                                                                          |
| Post-Conditions    | Le visiteur est désormais connectés en tant qu'utilisateur.                                                                                                                                          |
| Contraintes        |                                                                                                                                                                                                      |


| Cas d'utilisation :| Consulter son historique de calcul                              |
|--------------------|-----------------------------------------------------------------|
| Description        | Un utilisateur veut consulter ses fiches de calcul précédentes. |
| Portée             | Système ⬛                                                       |
| Niveau             | Utlisateur 🌊                                                   |
| Acteur Principale  | Utilisateur                                                     |                                                                          
| Scénario nominal   | 1. L'utilisateur se rends sur la page historique <br/>          |
| Scénario alternatifs |                                                                 |
| Scénario exceptionnel |                                                                 |
| Pré-condition      | L'utilisateur a déjà réalisé des calculs avec les modules       |
| Contraintes        |                                                                 |

| Cas d'utilisation :| Enregistrer une fiche de calcul                                                                                                             |
|--------------------|---------------------------------------------------------------------------------------------------------------------------------------------|
| Description        | Un utilisateur veut consulter ses fiches de calcul précédentes.                                                                             |
| Portée             | Système ⬛                                                                                                                                   |
| Niveau             | Utlisateur 🌊                                                                                                                               |
| Acteur Principale  | Utilisateur                                                                                                                                 |                                                                          
| Scénario nominal   | 1. L'utilisateur se rends sur un module <br/> 2. Réalise un calcul <br/> 3. Valide son calcul <br/> 4. Indique qu'il veut stocker le calcul |
| Scénario alternatifs |                                                                                                                                             |
| Scénario exceptionnel |                                                                                                                                             |
| Pré-condition      | La fiche de calcul est désormais enregistrer dans l'historique de l'utilisateur.                                                            |
| Contraintes        |                                                                                                                                             |

| Cas d'utilisation :| Modification du mot de passe utilisateur                                                                                                             |
|--------------------|---------------------------------------------------------------------------------------------------------------------------------------------|
| Description        | Un utilisateur peux modifier son mot de passe lorsqu'il est connecté                                                                          |
| Portée             | Système ⬛                                                                                                                                   |
| Niveau             | Utlisateur 🌊                                                                                                                               |
| Acteur Principale  | Utilisateur                                                                                                                                 |                                                                          
| Scénario nominal   | 1. L'utilisateur se connecte <br/> 2. Modifie son mot de passe <br/> 3. Valide sa modification <br/> |
| Scénario alternatifs |                                                                                                                                             |
| Scénario exceptionnel |                                                                                                                                             |
| Pré-condition      | L'utilisateur a un compte                                                           |
| Contraintes        |                                                                                                                                             |



## IV./ Chapitre 4 – La technologie employée

Il existe des exigences techniques pour ce projet tel que :
- L'utilisation d'un serveur Apache
- L'utilisation d'un serveur SQL
- Héberger les serveurs sur le RaspberryPi mis a disposition par l'IUT
- Développez le site et ses modules en PHP

