# <<Développement d’une application web de calcul>>

## I./ Introduction

### 1.Contexte

Dans le cadre de la seconde année de BUT informatique, le développement d’une application web, de A à Z, est proposé.. Cette dernière consiste est une plateforme de calcul possédant différents modules. 
Ce cahier des charges est rédigé afin de s'assurer que l’application peut répondre aux besoins en termes de fonctionnalités. Ce projet est à but pédagogique.
 
### 2.Objectifs

L'objectif du projet est de développer une application web de calcul robuste permettant l’accueil de plusieurs utilisateurs. 
Les fonctionnalités souhaitées sont donc : la gestion d’informations liés aux utilisateurs, la capacité à réaliser des calculs fiables.

### 3.Structure
	
### 4.Documents

Information générale sur le document, les objectifs du document, sa structure et les documents référencés.

## II./ Enoncé

Le problème est la mise en place d’un site web fonctionnel, conforme aux besoins du client.
Il faudra analyser les besoins de manière complète afin de cerner clairement le cahier des charges fourni.
L'objectif est de développer une application permettant à l’utilisateur d’effectuer des calculs et enregistrer les résultats dans des fichiers afin qu’il puisse garder une trace de son historique.

Il est nécessaire d’implémenter une page d'accueil avec un écran de connexion pour gérer les différents utilisateurs (administrateur système, administrateur web, utilisateur inscrit et visiteur), 
ainsi qu’un texte explicatif et une vidéo de présentation.

Il faudra également gérer les différents droits des utilisateurs:

-Le visiteur pourra accéder à la page d’accueil mais ne pourra pas utiliser les modules présents sur la plateforme.
 
-L’utilisateur 

Le tout en concevant un site web facile à prendre en main, faire en sorte que les informations et outils soient disponibles et facilement accessibles aux utilisateurs.

Description détaillée du problème à résoudre, le contexte, les objectifs du projet. Si besoin,
On fait une présentation de l’existant. Définition des objectifs que doit atteindre la solution.


## III./ Pré-requis

Connaissances requises, ressources matérielles et logicielles, compétences nécessaires.

Les connaissances que nous allons exploiter sont différents langages de programmation tels que PHP, Python, SQL, HTML, CSS et le langage R qui nous aideront dans la réalisation de notre site Web. 

Les ressources utilisé, Licenses de logicielle de développement, matériel physiques (pc, carte sd, Raspberry Pi, etc). 

## IV./ Priorités

Les priorités éventuelles du développements si elles ont été fixées avec l’accord du client :

-sécurité du site

-configuration du système de compte

-développement des modules de calcules


----------------------------------------------------------------------------------------------------------------------------------------------

## LECTURE DU CAHIER DES CHARGES SAE

| Acteurs             | Objets                                    | Actions                                                                  |
| :------------------ |:----------------------------------------- | :------------------------------------------------------------------------|
| Administrateur Web  |Page d’accueil                             |  Accéder à la page d’accueil                                             |
| Admin Sys           | Carte SD                                  |  Accéder à son profil pour changer son mot de passe                      |
| Client              | Mot de passe                              |  Voir la liste des utilisateurs inscrits                                 |
| Visiteur            | Profile                                   |  Stocker certains résultats de calcul qui s’affichera dans un historique |
|                     | Formulaire d’inscription                  |  Se connecter                                                            |
|                     | Serveur Web                               |  Créer des comptes utilisateurs à partir d’un fichier csv                |
|                     | Modules                                   |  Supprimer des comptes utilisateurs et l’historique liés à ces comptes   |
|                     | Plateforme                                |  Stocker les suppressions dans un fichier de log                         |
|                     | Le système                                |  Utiliser les modules de calculs qui sont disponibles                    |
|                     | Base de données                           |  Gérer les mots de passe                                                 |
|                     | Tableau de bord                           |  Consulter le fichier des logs                                           |
|                     | Applications pour sécuriser les accès ssh |   Inspecter les utilisateurs inscrits                                    |
|                     | Message de confirmation d'inscription     |                                                                          |
|                     | sms                                       |                                                                          |
|                     | historique                                |                                                                          |
|                     | journal d’activités                       |                                                                          |
|                     | liste d’utilisateur                       |                                                                          |
|                     | fichier csv                               |                                                                          |
|                     |captcha                                    |                                                                          |
|                     |texte applicatif                           |                                                                          |
|                     |compte utilisateur                         |                                                                          |
|                     |fichier de logs                            |                                                                          |

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
