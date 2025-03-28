# <<Développement d’une application web de calcul>>

## I./ Introduction

### 1.Contexte

Le projet s'inscrit dans le cadre de la seconde année de BUT informatique à l'IUT de Vélizy, durant les semestres 3 et 4 de l'année 2024. Il s'agit d'un projet transversal qui mobilise de nombreuses ressources du semestre, couvrant des domaines variés tels que le développement web (R301), le développement efficace (R302), l'analyse (R303), la qualité de développement (R304), la programmation système et l'architecture réseau (R305/R306), ainsi que d'autres aspects comme le SQL (R307), les probabilités (R308), la cryptographie (R309), le management des SI (R310/R311) et la communication professionnelle (R313).

La plateforme que nous devons développer sera hébergée sur un serveur Raspberry Pi 4 (RPI4) fourni par l'IUT. Ce choix technique nous progète dans un monde professionnel car nous devrons nous-mêmes procéder à l'installation et à la configuration complète de l'environnement, incluant le système d'exploitation, le serveur web et l'ensemble des applications nécessaire pour notre plateforme.
 
### 2.Objectifs

Ce document a pour vocation première de définir avec précision le projet et l'ensemble de ses fonctionnalités. Il servira de référence tout au long du développement, permettant d'assurer une communication claire entre les différents intervenants, qu'il s'agisse des professeurs ou des futurs utilisateurs. Dans un contexte de travail en équipe de cinq étudiants, selon nous, il est essentiel d'avoir une base documentaire solide qui guidera nos efforts de développement et servira de support pour l'évaluation finale du projet.

Nous développerons de notre mieux pour avoir une plateforme web performante et sécurisée, qui offrira différents modules de calculs accessibles via une interface web. Une attention particulière sera portée à la documentation du projet, qui devra respecter les bonnes pratiques de programmation et de gestion de projet.

### 3.Structure

Ce cahier des charges est structuré de manière logique pour couvrir tous les aspects du projet. Il commence par une introduction, qui présente le contexte et les objectifs, suivie d’une description technique détaillée, incluant un énoncé clair des objectifs du projet et des spécifications du serveur. La section des pré-requis du projet énumère les technologies (PHP, SQL, etc.) et les ressources (comme le Raspberry Pi 4) nécessaires. Nous y décrivons également les priorités de développement établies pour répondre efficacement aux attentes du client. Enfin, les fonctionnalités de la plateforme sont exposées en détail, avec une lecture approfondie du cahier des charges et une expression des exigences fonctionnelles et techniques.

### 4.Documents 
Documents référencés : 0 pour l'instant

## II./ Enoncé

Le projet a pour ambition le développement d'une application web de calcul robuste capable d'accueillir plusieurs utilisateurs, répondant ainsi aux besoins spécifiques du client. Cette plateforme doit non seulement gérer efficacement les informations liées aux utilisateurs mais aussi assurer des calculs fiables et performants à travers différents modules spécialisés.

L'interface utilisateur constitue un aspect crucial du projet. Le site web doit être intuitif et facilement accessible, permettant une prise en main rapide par les différents utilisateurs. Pour faciliter cette appropriation, la plateforme doit être accompagnée d'un texte explicatif détaillé ainsi que d'une vidéo de présentation mettant en valeur ses fonctionnalités.

Au cœur de l'application se trouvent plusieurs modules de calculs spécifiques qui seront définis ultérieurement selon les besoins du client. Ces modules devront être performants et produire des résultats fiables. L'application intègre un système complet de gestion des utilisateurs, permettant la création de comptes et l'authentification des utilisateurs. Une fois connecté, chaque utilisateur pourra effectuer des calculs dans les différents modules et sauvegarder ses résultats pour une consultation ultérieure.

La gestion des droits d'accès est structurée selon une hiérarchie claire comprenant quatre niveaux d'utilisateurs. Les visiteurs, au niveau le plus basique, peuvent uniquement accéder à la page d'accueil sans pouvoir utiliser les modules de calcul. Les utilisateurs inscrits disposent d'un accès complet aux modules et à leurs fonctionnalités. L'administrateur web possède des droits étendus lui permettant de gérer les comptes utilisateurs, notamment la consultation de la liste des inscrits, la suppression de comptes et la création de nouveaux comptes via des fichiers CSV. Au sommet de cette hiérarchie, l'administrateur système bénéficie d'un accès privilégié aux logs du système directement depuis l'interface web.

L'infrastructure technique repose sur un Raspberry Pi qui hébergera l'ensemble de la solution. Cette configuration nécessite l'installation et la configuration d'un serveur web, d'un système de gestion de base de données MySQL, ainsi que la mise en place de mesures de sécurité appropriées, notamment pour les accès SSH. L'ensemble doit former une solution cohérente et sécurisée, capable de répondre aux exigences de performance et de fiabilité attendues par le client.


*Pour le moment, nous ne disposons pas de consignes précises pour la mise en place des modules.*

## III./ Pré-requis

La réalisation de notre application web nécessite l'utilisation de plusieurs technologies et diverses ressources tant logicielles que matérielles. Notre développement s'appuiera sur un ensemble complet de langages de programmation pour répondre aux différents aspects du projet.

Le développement backend sera principalement assuré par PHP et Python, deux langages puissants et complémentaires. PHP servira de base pour la création des fonctionnalités web dynamiques, tandis que Python pourra être utilisé pour des traitements plus complexes et l'analyse de données. La gestion des données sera assurée par SQL, permettant une interaction avec notre base de données.

Pour la partie frontend, nous utiliserons HTML et CSS pour créer une interface utilisateur responsive. Ces technologies seront enrichies par l'utilisation du langage R, particulièrement adapté pour les calculs statistiques et la visualisation de données.

Sur le plan des ressources logicielles, notre équipe s'appuiera sur les environnement de développement (IDE) professionnels comme JetBrains, reconnus pour leur robustesse et leurs fonctionnalités avancées de développement. Le système d'exploitation Raspberry Pi OS sera déployé sur notre serveur, offrant un environnement stable et optimisé pour notre infrastructure.

Concernant les ressources matérielles, nous disposerons des ordinateurs de l'IUT pour le développement, complétés par un Raspberry Pi qui servira de serveur de production. Une carte SD sera utilisée pour le stockage du système et des données, formant ainsi une infrastructure complète et autonome pour notre application.

## IV./ Priorités de développement

Les priorités éventuelles du développement à confirmer avec le client :

1. **Configuration du Serveur et Installation du Système**

   Notre première priorité est la mise en place d'une infrastructure technique solide. Cela comprend la configuration complète du serveur Raspberry Pi, l'installation du système d'exploitation, la mise en place du serveur web et le déploiement de la base de données MySQL. Cette étape fondamentale doit garantir un environnement stable et performant pour notre application.

2. **Développement des Modules de Calcul**

   Au cœur de notre plateforme se trouvent les modules de calcul. Une fois les spécifications reçues du client, nous concentrerons nos efforts sur le développement de ces modules. Chacun devra être conçu avec une attention particulière portée à la performance et à la fiabilité des résultats, garantissant ainsi la qualité des calculs effectués.

3. **Gestion des Utilisateurs et des Droits d'Accès**

   La mise en place d'un système robuste de gestion des utilisateurs constitue notre troisième priorité. Ce système devra gérer efficacement les différents niveaux d'accès, du simple visiteur à l'administrateur système, en passant par l'utilisateur inscrit et l'administrateur web. La sécurité et le contrôle des accès sont essentiels pour préserver l'intégrité de la plateforme.

4. **Conception de l'Interface Utilisateur**

   L'interface utilisateur doit être intuitive et accessible pour tous les types d'utilisateurs. Nous développerons une interface responsive qui guidera naturellement les utilisateurs dans leur utilisation des différents modules. Une attention particulière sera portée à l'expérience utilisateur pour faciliter l'adoption de la plateforme.

5. **Documentation et Support Utilisateur**

   La création d'une documentation complète et claire est essentielle. Elle comprendra des guides d'utilisation, un texte explicatif détaillé et une vidéo de présentation. Ces ressources faciliteront non seulement l'utilisation de la plateforme mais serviront également de support pour l'évaluation du projet.

6. **Sécurité de l'Application**

   La sécurisation globale de l'application est une priorité. Cela inclut la protection des accès SSH, la sécurisation des communications entre le frontend et le backend, et la mise en place de mesures de protection des données. Ces éléments sont cruciaux pour garantir la confidentialité et l'intégrité du système.

7. **Tests et Validation**

   Enfin, une phase complète de tests et de validation sera menée avant la mise en production. Cette étape permettra de vérifier le bon fonctionnement de chaque module, la performance globale de l'application et la robustesse des mesures de sécurité mises en place. Cette validation finale est indispensable pour s'assurer que notre solution répond pleinement aux attentes du client.

----------------------------------------------------------------------------------------------------------------------------------------------

## LECTURE DU CAHIER DES CHARGES (énoncé SAE)

| Acteurs            | Objets                                                  | Actions                                                                  |
|:-------------------|:--------------------------------------------------------| :------------------------------------------------------------------------|
| Administrateur Web | Page d’accueil                                          |  Accéder à la page d’accueil                                             |
| Admin Sys          | Carte SD                                                |  Accéder à son profil pour changer son mot de passe                      |
| Client             | Mot de passe                                            |  Voir la liste des utilisateurs inscrits                                 |
| Visiteur           | Profile                                                 |  Stocker certains résultats de calcul qui s’affichera dans un historique |
|                    | Formulaire d’inscription                                |  Se connecter                                                            |
|                    | Serveur Web                                             |  Créer des comptes utilisateurs à partir d’un fichier csv                |
|                    | Modules                                                 |  Supprimer des comptes utilisateurs et l’historique liés à ces comptes   |
|                    | Plateforme                                              |  Stocker les suppressions dans un fichier de log                         |
|                    | Le système                                              |  Utiliser les modules de calculs qui sont disponibles                    |
|                    | Base de données                                         |  Gérer les mots de passe                                                 |
|                    | Tableau de bord                                         |  Consulter le fichier des logs                                           |
|                    | Applications pour sécuriser les accès ssh               |  Inspecter les utilisateurs inscrits                                     |
|                    | Message de confirmation d'inscription                   |  Consulter le journal d'activités de l'application Web                   |
|                    | fichier de logs                                         |  Créer un compte utilisateur à partir d'un formulaire                    |
|                    | historique                                              |  Créer un fichier log après la suppression d'un compte utilisateur       |
|                    | journal d’activités                                     |  interdire l'utilisation des modules de calcules aux utilisateurs<br> non enregistrer|
|                    | liste d’utilisateur                                     |  modifier son mot de passe s'il est oublié                               |
|                    | fichier csv                                             |                                                                          |
|                    | captcha                                                 |                                                                          |
|                    | texte applicatif                                        |                                                                          |
|                    | compte utilisateur                                      |                                                                          |


### Exigences fontionnelles et techniques

| Exigences fonctionnelles                         | Exigences techniques                                                     |
|--------------------------------------------------|--------------------------------------------------------------------------| 
|Créer un compte utilisateur à parir d'un login et d'un mot de passe |Serveur Web APACHE                                      |
|Authentifier un utilisateur grâce à son login est son mot de passse  |Base de données MySQL                                  |
|Enregistrer les informations d'un compte utilisateur dans une base de données |Carte SD                                      |
|Identifier les utilisaeurs enregistrés des non-enregistré |Ordinateur                                                        |
|Accès au module de calcul seulement pour les utilisateurs enregistrés|Système d'exploitation                                 |
|Enregistrer les résultats des modules de calcules dans un historique supprimable <br>par admin Web ||
|Modifier le mot de passe de son profil utilisateur||
|Créer un fichier Log, consultable par l'administrateur Web, dans le serveur après <br>chaque inscriptions||
|Pouvoir reconstruir un mot de passe utilisateur si l'ancien est oublié||
|Créer et maintenir une liste d'utilisateur consulable et modifiable par <br>l'administrateur Web||
|Créer un fichier Log dans le serveur après chaque suppression de comptes utilisateurs<br>ou/et de leurs historique  ||
|Enregistrer les interactions avec la plateforme dans un journal d'activités consultable <br>par l'admin Système||


--------------------------------------------------------------------------------------------------------------------------------

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
