# <<Développement d’une application web de calcul>>

## I./ Introduction

### 1.Contexte

Dans le cadre de la seconde année de BUT informatique, le développement d’une application web, de A à Z, est proposé.
Cette dernière est une plateforme de calcul possédant différents modules. 
Ce cahier des charges est rédigé afin de s'assurer que l’application peut répondre aux besoins du client.
On analyse les besoins définis dans l'énoncé afin de créer un cahier des charges fourni.
Ce projet est à but pédagogique.
 
### 2.Objectifs

L'objectif de ce document est d'avoir une vision précises des attentes du client et facilités la communication avec lui. 
On presentera clairement les fonctionnalités voulus par le client.

### 3.Structure
Ce document est constitué d'un énoncé clair des objectifs du projet, des pré-requis au projet, ainsi que des priorités de développement fixés avec le client.

### 4.Documents 
Documents référencés : 0 pour l'instant


## II./ Enoncé

### 1.Objectif du projet
L'objectif du projet est de développer une application web de calcul robuste permettant l’accueil de plusieurs utilisateurs,
conformément aux besoins du client.  
Les fonctionnalités souhaitées sont donc : la gestion d’informations liés aux utilisateurs, la capacité à réaliser des calculs fiables et performants.  
Le site web doit être facile à prendre en main, les informations et outils doivent être disponibles et facilement accessibles aux utilisateurs.
De plus, un texte explicatif et une vidéo de présentation doivent être réaliser pour mettre en valeur la plateforme.

Ici, la liste détaillés des attentes fonctionnelles évoqués par le client :


* L'application accueille différents modules comme : 
  - [REPONSE CLIENT]
  - [REPONSE CLIENT]
  - [REPONSE CLIENT]
  - [REPONSE CLIENT]


* L'application doit permettre à l’utilisateur de créer ou de se connecter à son compte.


* L'utilisateur peut effectuer des calculs dans un des modules puis enregistrer les résultats.


* L'application doit enregistrer une liste des utilisateurs inscrits et un fichier log des connexions.


* L'application doit gérer les différents utilisateurs et leur droit (administrateur système, administrateur web, utilisateur inscrit et visiteur).
  * Le visiteur peut accéder à la page d’accueil mais ne pourra pas utiliser les modules présents sur la plateforme. 
  
  * L’administrateur web peut consulter les fichier logs, supprimer des comptes, créer des comptes à partir de fichiers csv.
  * L'administrateur système peut, depuis la plateforme web, accéder aux logs du systèmes.










Un serveur web et un SGBD sera mis en place pour faire fonctionner l'application



Description détaillée du problème à résoudre, le contexte, les objectifs du projet. Si besoin,
On fait une présentation de l’existant. Définition des objectifs que doit atteindre la solution.


## III./ Pré-requis

Les connaissances que nous allons exploiter pour la réalisation de notre application Web sont différents langages de programmation tels que :
* PHP
* Python
* SQL
* HTML/CSS 
* Langage R

Les ressources logicielles utilisées sont des IDE de la suite logicielle de JetBrains et Raspberry Pi OS

Les ressources matérielles seront les ordinateurs de l'IUT, un RaspberryPi et une carte SD.

## IV./ Priorités

Les priorités éventuelles du développements si elles ont été fixées avec l’accord du client :

-sécurité du site

-configuration du système de compte

-développement des modules de calcules


----------------------------------------------------------------------------------------------------------------------------------------------

## LECTURE DU CAHIER DES CHARGES (énoncé SAE)

| Acteurs            | Objets                                    | Actions                                                                  |
|:-------------------|:----------------------------------------- | :------------------------------------------------------------------------|
| Administrateur Web |Page d’accueil                             |  Accéder à la page d’accueil                                             |
| Admin Sys          | Carte SD                                  |  Accéder à son profil pour changer son mot de passe                      |
| Client             | Mot de passe                              |  Voir la liste des utilisateurs inscrits                                 |
| Visiteur           | Profile                                   |  Stocker certains résultats de calcul qui s’affichera dans un historique |
|                    | Formulaire d’inscription                  |  Se connecter                                                            |
|                    | Serveur Web                               |  Créer des comptes utilisateurs à partir d’un fichier csv                |
|                    | Modules                                   |  Supprimer des comptes utilisateurs et l’historique liés à ces comptes   |
|                    | Plateforme                                |  Stocker les suppressions dans un fichier de log                         |
|                    | Le système                                |  Utiliser les modules de calculs qui sont disponibles                    |
|                    | Base de données                           |  Gérer les mots de passe                                                 |
|                    | Tableau de bord                           |  Consulter le fichier des logs                                           |
|                    | Applications pour sécuriser les accès ssh |   Inspecter les utilisateurs inscrits                                    |
|                    | Message de confirmation d'inscription     |                                                                          |
|                    | sms                                       |                                                                          |
|                    | historique                                |                                                                          |
|                    | journal d’activités                       |                                                                          |
|                    | liste d’utilisateur                       |                                                                          |
|                    | fichier csv                               |                                                                          |
|                    |captcha                                    |                                                                          |
|                    |texte applicatif                           |                                                                          |
|                    |compte utilisateur                         |                                                                          |
|                    |fichier de logs                            |                                                                          |

## QUESTIONS CLIENT

### Question 1 :

Il serait nécessaire d’avoir des précisions sur les modules proposant des calculs : quels types de calculs, des représentations graphiques sont-elles souhaitées,et si oui lesquelles ?

### Question 2 :

Pourrait-on avoir plus de précisions sur la vidéo de présentation du site ? 

S'agit-il d'une vidéo que nous devons réaliser nous-mêmes en nous filmant ?

ou bien devons nous faire un montage avec des captures d’écrans expliquant les fonctionnalités du site ?

### Question 3:

Y a t-il une limite au nombre de personnes utilisent le site simultanément?

### Question 4:

Il y a t-il des contraintes dans le choix des couleurs ou des formes pour le site?

### Question 5:

Avez vous des points ou des commentaire important à ajouter

### Question 6:

Le site sera-t-il utilisé sur différentes plateformes? (smartphone Android/IOS, ordinateur, etc)

### Question 7:

Est-ce que le site doit être fortement accessible ?

### Question 8:

Est-ce que l’historique doit-il être supprimé après une certaine période ?

### Question 9:

Est-ce que le fichier de logs dispose de limites de stockage ?

Est-ce que les fichiers de logs doivent être supprimés après une certaine période ?

### Question 10:

les administrateur pourraient-ils modifier les comptes utilisateurs 

### Question 11:

Les utilisateurs pourront-ils modifier leur identifiant après l’avoir créé ?
