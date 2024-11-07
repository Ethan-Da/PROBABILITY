## I./ Chapitre 1 – Objectif et portée


Le projet consiste à mettre en place une plateforme web de calculs mathématiques. 
Son objectif général est l'apprentissage de bonnes méthodes de développements et le respect des besoins client expliciter dans le cahier des charges.

Le projet est encadré par Monsieur Hoguin, principalement pour la partie Web. La conception est encadré par Monsieur Djerroud. 
L'équipe de développement est constitué de : Maxence Arsène, Bloumkoum Camara, Roméo Leblond, Ethan Dangeul, Hazim-Rayan Marouan. 

Le projet sera limité au réseau de l'IUT de Vélizy. Sa portée reste pédagodique et il n'est pas destiné a être mis en ligne.


## II./ Chapitre 2 – Terminologie employée / Glossaire

**SAé** (Situation d'Apprentissage et d'Évaluation) : Projet permettant aux étudiants de mettre en pratique des compétences techniques et théoriques acquises durant l'année.

**RPI (Raspberry Pi)** : Ordinateur monocarte utilisé pour héberger le serveur web du projet et exécuter l'application développée.

**Github** : Plateforme de gestion de versions utilisée pour héberger le code source du projet et permettre le suivi des modifications.

**Administrateur web** : Personne responsable de la gestion des utilisateurs inscrits, des modules de calculs et de la maintenance des comptes via l'interface d'administration.

**Administrateur système** : Personne en charge de la gestion du serveur, notamment de la configuration, du déploiement, et de la maintenance des services associés à la plateforme web.

## III./ Chapitre 3 – Les cas d’utilisation

Le diagramme comprenant les acteurs principaux et leurs objectifs est dans le dossier images

https://lucid.app/lucidchart/0396fa81-ce6c-4a1f-97a1-1d0d16478c6c/edit?viewport_loc=-505%2C106%2C2986%2C1398%2C.Q4MUjXso07N&invitationId=inv_54497026-5345-4f18-9af9-9367bdc4bf39

### Cas d'utilisation système : 

| Cas d'utilisation : | Créer compte utilisateur                                                                                                                                                                   |
|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| **Description**         | Un visiteur veut créer un compte utilisateur pour accéder aux modules de calculs                                                                                                                |
|**Portée**              | Système ⬛                                                                                                                                                                                       |
| **Niveau**              | Utlisateur 🌊                                                                                                                                                                                   |
| **Acteur Principale**   | Visiteur                                                                                                                                                                                        |                                                                                |
|**Scénario nominal**    | 1. Le visiteur se rends sur le formulaire d'inscription <br/> 2. Le visiteur rentre ses informations <br/> 3. Le visiteur valide le capcha <br/>  4. Une confirmation est affiché au visiteur <br/> |
| **Scénario alternatifs** |                                                                                                                                                                                                 |
| **Scénario exceptionnel** | 1. Le login existe déja <br/>  &nbsp; &nbsp; &nbsp; &nbsp; a. Le visiteur se rends sur le formulaire d'inscription <br/> &nbsp; &nbsp; &nbsp; &nbsp; b. Le visiteur rentre ses informations <br/>                             &nbsp; &nbsp; &nbsp; &nbsp; c. Le visiteur valide le captcha <br/>  &nbsp; &nbsp; &nbsp; &nbsp; d. Renvoie une erreur lui indiquant que le login est déja pris <br/>2. Le login ne possède pas le                             nombre de caractères requis <br/>  &nbsp; &nbsp; &nbsp; &nbsp; a. Le visiteur se rends sur le formulaire d'inscription <br/> &nbsp; &nbsp; &nbsp; &nbsp; b. Le visiteur rentre ses informations                               <br/> &nbsp; &nbsp; &nbsp; &nbsp; c. Le visiteur valide le captcha <br/>  &nbsp; &nbsp; &nbsp; &nbsp; d.Renvoie une erreur lui indiquant que le login ne possède pas le nombre nécessaire de                                   caractères                                                                                                                                                                                   |
| **Post-Conditions**     | Un compte utilisateur a été crée.                                                                                                                                                               |



| Cas d'utilisation : | Se connecter                                                                                                                                                                                         |
|--------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| **Description**        | Un visiteur veut se connecter a son compte utilisateur                                                                                                                                               |
| **Portée**            | Système ⬛                                                                                                                                                                                            |
| **Niveau**             | Utlisateur 🌊                                                                                                                                                                                        |
| **Acteur Principale**  | Visiteur                                                                                                                                                                                             |                                                                                |
| **Scénario nominal**   | 1. Le visiteur se rends sur le formulaire de connexion <br/> 2. Le visiteur rentre ses informations <br/> 3. Le visiteur valide <br/> 4. Une confirmation de connexion est affiché au visiteur <br/> |
| **Scénario alternatifs**|  1. L'utilisateur se connecte grace a un cookie                                                                                                                                                      |
| **Scénario exceptionnel**|1. L'utilisateur se trompe de mot de passe <br/>  &nbsp; &nbsp; &nbsp; &nbsp; a. Le visiteur se rends sur le formulaire de connexion <br/>  &nbsp; &nbsp; &nbsp; &nbsp; b. Le visiteur rentre ses                             informations <br/> &nbsp; &nbsp; &nbsp; &nbsp; c. Le visiteur valide <br/>  &nbsp; &nbsp; &nbsp; &nbsp; d.  Renvoie une erreur lui indiquant que le mot de passe ne correspond pas  <br/> 2. Le                               login n'existe pas <br/>  &nbsp; &nbsp; &nbsp; &nbsp; a. Le visiteur se rends sur le formulaire de connexion <br/>  &nbsp; &nbsp; &nbsp; &nbsp; b. Le visiteur rentre ses informations <br/> &nbsp;                           &nbsp; &nbsp; &nbsp; c. Le visiteur valide <br/>  &nbsp; &nbsp; &nbsp; &nbsp; d. Renvoie une erreur lui indiquant que le login n'existe pas                                                         |
| **Pré-condition**      | Il existe un compte utilisateur correspondant aux informations du visiteur.                                                                                                                          |
| **Post-Conditions**    | Le visiteur est désormais connectés en tant qu'utilisateur.                                                                                                                                          |


| Cas d'utilisation :| Consulter son historique de calcul                              |
|--------------------|-----------------------------------------------------------------|
| **Description**        | Un utilisateur veut consulter ses fiches de calcul précédentes. |
| **Portée**             | Système ⬛                                                       |
| **Niveau**             | Utlisateur 🌊                                                   |
| **Acteur Principale**  | Utilisateur                                                     |                                                                          
| **Scénario nominal**   | 1. L'utilisateur se rends sur la page historique <br/>          |
| **Scénario alternatifs** |                                                                 |
| **Scénario exceptionnel** |                                                                 |
| **Pré-condition**      | L'utilisateur a déjà réalisé des calculs avec les modules       |


| Cas d'utilisation :| Enregistrer une fiche de calcul                                                                                                             |
|--------------------|---------------------------------------------------------------------------------------------------------------------------------------------|
| **Description**        | Un utilisateur veut consulter ses fiches de calcul précédentes.                                                                             |
| **Portée**             | Système ⬛                                                                                                                                   |
| **Niveau**             | Utlisateur 🌊                                                                                                                               |
| **Acteur Principale**  | Utilisateur                                                                                                                                 |                                                                          
| **Scénario nominal**   | 1. L'utilisateur se rends sur un module <br/> 2. Réalise un calcul <br/> 3. Valide son calcul <br/> 4. Indique qu'il veut stocker le calcul |
| **Scénario alternatifs** |                                                                                                                                             |
| **Scénario exceptionnel** |                                                                                                                                             |
| **Pré-condition**      | La fiche de calcul est désormais enregistrer dans l'historique de l'utilisateur.                                                            |


| Cas d'utilisation :| Modification du mot de passe utilisateur                                                                                                             |
|--------------------|---------------------------------------------------------------------------------------------------------------------------------------------|
| **Description**        | Un utilisateur peux modifier son mot de passe lorsqu'il est connecté                                                                          |
| **Portée**             | Système ⬛                                                                                                                                   |
| **Niveau**             | Utlisateur 🌊                                                                                                                               |
| **Acteur Principale**  | Utilisateur                                                                                                                                 |                                                                          
| **Scénario nominal**   | 1. L'utilisateur se connecte <br/> 2. Modifie son mot de passe <br/> 3. Valide sa modification <br/> |
| **Scénario alternatifs** |                                                                                                                                             |
| **Scénario exceptionnel** | 1. L'utilisateur rentre le même mot de passe  <br/>  &nbsp; &nbsp; &nbsp; &nbsp; a. L'utilisateur se connecte <br/> &nbsp; &nbsp; &nbsp; &nbsp; b. Modifie son mot de passe <br/> &nbsp; &nbsp;                               &nbsp; &nbsp; c. Valide sa modification <br/> &nbsp; &nbsp; &nbsp; &nbsp; d. Renvoie une erreur lui indiquant que le mot de passe est le même    |
| **Pré-condition**      | L'utilisateur a un compte                                                                                                            |

ADMIN WEB : 

| Cas d'utilisation :| Supression de compte utilisateur                                                                                                              |
|--------------------|---------------------------------------------------------------------------------------------------------------------------------------------|
| **Description**        | L'administrateur web veut supprimer un compte utilisateur                                                                         |
| **Portée**             | Système ⬛                                                                                                                                   |
| **Niveau**             | Utlisateur 🌊                                                                                                                               |
| **Acteur Principale**  | Administrateur web                                                                                                                                 |                                                                          
| **Scénario nominal**   | 1. L'admin se connecte <br/> 2. Se rends sur la page de gestion des comptes <br/> 3. Selectionne un compte a supprimer <br/> 4. Valide la suppression <br/> 5. Une confirmation est affiché 
| **Scénario alternatifs** |                                                                                                                                             |
| **Scénario exceptionnel** |                                                                                                                                             |
| **Pré-condition**      | Il existe au moins un ou plus compte utilisateur                                                           |

| Cas d'utilisation :| Créer compte(s) utilisateur                                                                                                        |
|--------------------|---------------------------------------------------------------------------------------------------------------------------------------------|
| **Description**        | L'admin veux créer des comptes utilisateurs                                                                          |
| **Portée**             | Système ⬛                                                                                                                                   |
| **Niveau**             | Utlisateur 🌊                                                                                                                               |
| **Acteur Principale**  | Administrateur Web                                                                                                                                 |                                                                          
| **Scénario nominal   | 1. L'admin se connecte <br/> 2. Se rends sur la page des gestion des comptes <br/> 3. Crée un nouveau compte <br/> 4. Valide la création <br/> 5. Une confirmation est affiché |
| **Scénario alternatifs |1.Avec un fichier CSV <br/> &nbsp;&nbsp;&nbsp;&nbsp;a. L'admin se connecte <br/> &nbsp;&nbsp;&nbsp;&nbsp;b. Se rends sur la page des gestion des comptes <br/> &nbsp;&nbsp;&nbsp;&nbsp;c. Envoie son fichier csv au bon format <br/> &nbsp;&nbsp;&nbsp;&nbsp;d. Valide <br/> &nbsp;&nbsp;&nbsp;&nbsp;e. Une confirmation est affiché         |
| **Scénario exceptionnel** |                                                                                                                                             |
| **Pré-condition**      |                                                                                                                                                |

|Cas d'utilisation :| Enregistrer un fichier log |
|--------------------|-----------------------|
|**Description**| Enresgitrement d'un fichier log décrivant une action spécifique prédéterminée dans le système |
|**Portée**| Sous-partie 🔩 |
|**Niveau**| Sous-fonction 🐟 |
|**Acteur Principal**| Administrateur Web|
|**Scénario Nominal**|1. Un visiteur accède au formulaire d'inscription du site</br>2. Le visiteur créer un nouveau compte</br>|
|**Scénario Alternatif**|I.1. Un admistrateur Web se connecte au compte ***adminweb***</br>_2. L'administrateur supprime un compte<br>II.1. Un administrateur Web se connecte au compte ***adminweb***</br>_2. L'administrateur creer un compte à partir d'un fichier csv|
|**Scénario Exceptionnel**||
|**Prérequis**||

|Cas d'utilisation :| Se déconnecter |
|--------------------|-----------------------|
|**Description**| Un utilisateur veut se déconnecter de son compte|
|**Portée**| Système ⬛ |
|**Niveau**| Utilisateur 🌊|
|**Acteur Principale**| utilisateur |
|**Scénario Nominal**||
|**Scénario alternatif**||
|**Scénario Exceptionnel**||
|**Prérequis**||

|Cas d'utilisation :| Verifier la validité du contenu du formulaire de d'inscription |
|--------------------|-----------------------|
|**Description**| Un utilisateur veut vérifier que les informations d'inscription  qu'il a entré dans le formulaire sont correctes |
|**Portée**| Sous-partie 🔩 |
|**Niveau**| Utilisateur 🌊 |
|**Acteur Principale**| utilisateur |
|**Scénario Nominal**|1. L'utilisateur accède au formulaire d'inscription du site</br>2. L'utilisateur entre ses informations personelles pour se connecter </br>3. L'utilisateur clique sur le bouton de vérification du formulaire</br>|
|**Scénario alternatif**||
|**Scénario Exceptionnel**||
|**Prérequis**||

|Cas d'utilisation :| Verifier la validité du contenu du formulaire de connexion |
|--------------------|-----------------------|
|**Description**| Un utilisateur veut vérifier que les informations qu'il a entré dans le formulaire sont correctes |
|**Portée**| Sous-partie 🔩 |
|**Niveau**| Utilisateur 🌊 |
|**Acteur Principale**| utilisateur |
|**Scénario Nominal**|1. L'utilisateur accède au formulaire d'inscription du site</br>2. L'utilisateur entre ses informations de connexions </br>2. L'utilisateur clique sur le bouton de vérification du formulaire</br>|
|**Scénario alternatif**||
|**Scénario Exceptionnel**||
|**Prérequis**||


## IV./ Chapitre 4 – La technologie employée

Il existe des exigences techniques pour ce projet tel que :
- L'utilisation d'un serveur ***Apache***
- L'utilisation d'un serveur ***SQL***
- Héberger les serveurs sur le ***RaspberryPi*** mis a disposition par l'IUT
- Développez le site et ses modules en ***PHP***
