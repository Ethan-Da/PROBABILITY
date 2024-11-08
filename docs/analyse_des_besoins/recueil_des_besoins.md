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
|**Pré-condition**||

|Cas d'utilisation :| Se déconnecter |
|--------------------|-----------------------|
|**Description**| Un utilisateur veut se déconnecter de son compte|
|**Portée**| Système ⬛ |
|**Niveau**| Utilisateur 🌊|
|**Acteur Principale**| utilisateur |
|**Scénario Nominal**|1. L'utilisateur va sur son profil <br/> 2. Appuie sur le bouton pour se déconnecter|
|**Scénario alternatif**||
|**Scénario Exceptionnel**||
|**Pré-condition**|Possède un compte|

|Cas d'utilisation :| Verifier la validité du contenu du formulaire de d'inscription |
|--------------------|-----------------------|
|**Description**| Un utilisateur veut vérifier que les informations d'inscription  qu'il a entré dans le formulaire sont correctes |
|**Portée**| Sous-partie 🔩 |
|**Niveau**| Utilisateur 🌊 |
|**Acteur Principale**| utilisateur |
|**Scénario Nominal**|1. L'utilisateur accède au formulaire d'inscription du site</br>2. L'utilisateur entre ses informations personelles pour se connecter </br>3. L'utilisateur clique sur le bouton de vérification du formulaire</br>|
|**Scénario alternatif**||
|**Scénario Exceptionnel**||
|**Pré-condition**||

|Cas d'utilisation :| Verifier la validité du contenu du formulaire de connexion |
|--------------------|-----------------------|
|**Description**| Un utilisateur veut vérifier que les informations qu'il a entré dans le formulaire sont correctes |
|**Portée**| Sous-partie 🔩 |
|**Niveau**| Utilisateur 🌊 |
|**Acteur Principale**| utilisateur |
|**Scénario Nominal**|1. L'utilisateur accède au formulaire d'inscription du site</br>2. L'utilisateur entre ses informations de connexions </br>2. L'utilisateur clique sur le bouton de vérification du formulaire</br>|
|**Scénario alternatif**||
|**Scénario Exceptionnel**||
|**Pré-condition**||

|Cas d'utilisation :| Utiliser un module de calcul |
|--------------------|-----------------------|
|**Description**| Un utilisateur veut utilliser un module de calcul|
|**Portée**| Système ⬛ |
|**Niveau**| Utilisateur 🌊|
|**Acteur Principale**| utilisateur |
|**Scénario Nominal**|1. Choisi le module de calcul qu'il veut utilisé <br/> 2. Rentre les données pour le calcul <br/> 3. Effectue le calcul|
|**Scénario alternatif**|1. Il veut faire un calcul a partir d'un caclcul déja effectué <br/> &nbsp;&nbsp;&nbsp;&nbsp; a. Cherche dans son historique le calcul  <br/> &nbsp;&nbsp;&nbsp;&nbsp; b. Modifie les valeurs <br/> &nbsp;&nbsp;&nbsp;&nbsp; c. Effectue le calcul |
|**Scénario Exceptionnel**||
|**Pré-condition**|Possède un compte|


## IV./ Chapitre 4 – La technologie employée

Il existe des exigences techniques pour ce projet tel que :
- L'utilisation d'un serveur ***Apache***
- L'utilisation d'un serveur ***SQL***
- Héberger les serveurs sur le ***RaspberryPi*** mis a disposition par l'IUT
- Développez le site et ses modules en ***PHP***

## V./ Chapitre 5 – Autres exigences 

   Les participants au projet "Développement d’une application web de calcul" se composent d'ARSENE Maxence, DANGEUL Ethan, CAMARA Blomkoum, LEBLOND Roméo et MAROUAN Hazim-Rayan. Pour réaliser ce projet, nous nous baserons sur plusieurs valeurs fondamentales qui nous      guideront pour le développement de ce site web.

   Tout d’abord, la simplicité est cruciale : l’interface doit être intuitive, permettant une prise en main rapide et fluide pour naviguer aisément entre les différents modules de calcul. La disponibilité est également essentielle pour garantir un accès constant à la      plateforme. Par ailleurs, la rapidité est primordiale pour offrir des calculs performants et immédiats, favorisant ainsi une utilisation sans délai. En raison de la gestion des utilisateurs et des droits d'accès, la sécurité s’avère être une priorité pour protéger      les données et garantir des accès sûrs et contrôlés. Enfin, la souplesse du système est indispensable, afin que l'application puisse facilement évoluer pour intégrer de nouveaux modules ou fonctionnalités sans compromettre la stabilité existante. Ces valeurs            guideront chaque étape du développement pour aboutir à une solution fiable et adaptable aux attentes des utilisateurs et du client.

   Les clients souhaitent une visibilité régulière sur l’avancement du projet. Ils attendent des rapports périodiques et des mises à jour sur les différentes phases de développement. 
   
   Pour mener à bien le projet, certains éléments peuvent être achetés tandis que d’autres devront être développés. En termes d’achats, l’équipe a besoin d'équipements de base pour le serveur, comme un Raspberry Pi 4 et ses accessoires, notamment une carte SD. En ce       qui concerne la conception, la plateforme web elle-même doit être développée, y compris l'infrastructure nécessaire pour l'hébergement, la gestion des utilisateurs et les modules de calcul spécifiques. Quant aux concurrents, ce sont nos camarades de classe qui          développeront eux aussi les modules de calculs et leur propre site web.

   Le processus de développement impose plusieurs exigences techniques et opérationnelles. Tout d’abord, des tests réguliers doivent être effectués, incluant des tests unitaires et fonctionnels, pour garantir que chaque fonctionnalité de l'application fonctionne           correctement. L’installation de l’application doit être réalisée sur un Raspberry Pi 4 et elle doit être accessible via un réseau local. En outre, une documentation complète sera rédigée pour faciliter l’utilisation et la maintenance de la plateforme, pour les          clients, afin d'assurer une gestion efficace.

   Le projet repose sur plusieurs dépendances qui influencent son bon fonctionnement. Il dépend d’abord de la fiabilité du serveur Raspberry Pi, qui doit être opérationnel et correctement configuré. La connexion réseau au sein de l'établissement joue aussi un rôle clé,    notamment pour assurer un accès fluide à la plateforme. Les technologies choisies, telles que PHP, MySQL, et les autres outils de développement, sont également des dépendances importantes. Enfin, l'équipe doit respecter les politiques de sécurité de l'IUT, notamment    en ce qui concerne l'accès à distance, ce qui peut affecter l'accès des utilisateurs et des administrateurs à la plateforme.

   Les **règles métier** du projet "Développement d’une application web de calcul" visent à structurer les différentes opérations de calcul et les accès utilisateurs. L'application devra respecter les droits d'accès définis pour chaque niveau d’utilisateur afin de         garantir que les calculs sensibles ou avancés ne soient accessibles qu'aux personnes autorisées. De plus, la plateforme doit gérer efficacement les données d’entrée et de sortie des calculs en vérifiant leur validité avant exécution. Par exemple, si certaines       
   formules nécessitent des valeurs spécifiques, l’application devra bloquer les saisies incorrectes et alerter l’utilisateur, assurant ainsi la fiabilité des calculs. Enfin, l'utilisateur pourra enregistrer chaque calcul dans un historique si il le désire. 

   La **performance** de l'application est un élément essentiel, étant donné que les utilisateurs s'attendent à des calculs rapides et précis. Le serveur doit être capable de traiter les requêtes sans délai perceptible. Pour cela, l’application doit optimiser les algorithmes de calcul et minimiser l’utilisation des ressources du Raspberry Pi. Par ailleurs, l’application doit être capable de gérer plusieurs utilisateurs simultanément sans affecter ses performances. Des mécanismes de mise en cache ou d’optimisation de requêtes peuvent également être envisagés pour améliorer la rapidité d'exécution.

En matière d’opérations, l’application doit garantir une disponibilité optimale et une gestion efficace des sessions utilisateurs. La sécurité est cruciale, surtout en raison de la gestion de niveaux d'accès multiples. Les données doivent être protégées contre les accès non autorisés, notamment via des mécanismes d'authentification robustes et une gestion des droits précise. Enfin, une documentation complète est essentielle pour les utilisateurs et les administrateurs de l’application.

L’application doit être **intuitive et simple** d’utilisation afin de répondre aux besoins d’utilisateurs ayant des compétences variées. Son interface utilisateur doit être conçue de manière simple, avec des menus et options bien agencés pour faciliter la navigation et l’accès aux fonctionnalités. Les calculs doivent être présentés de manière claire et accessible, avec des messages explicites pour guider l’utilisateur en cas d’erreur de saisie. L'objectif est de garantir que les utilisateurs peuvent exploiter l'application sans avoir de question préalable à se poser. C'est pour cela que nous identifierons les besoins du client tout en se posant les questions que l'utilisateur pourrait se poser lors de l'utilisation de l'application.

La **qualité logicielle** de l'application repose sur plusieurs indicateurs essentiels qui garantissent sa durabilité, sa flexibilité et sa performance. Tout d'abord, la capacité fonctionnelle est primordiale, car l'application doit remplir les besoins des utilisateurs de manière précise et complète. Cela implique que les fonctionnalités soient alignées avec les attentes et les règles métier définies, sans erreurs ni comportements inattendus, afin d'assurer un service fiable et utile.

La facilité d’utilisation est également un critère majeur. L’interface utilisateur doit être intuitive et facile à naviguer pour que les utilisateurs puissent accomplir leurs tâches sans formation complexe. Une interface bien conçue réduit les erreurs et améliore l'efficacité et la satisfaction des utilisateurs, rendant l'application accessible même aux moins expérimentés.

La fiabilité garantit que l'application fonctionne sans interruptions imprévues, même en cas de fortes charges de travail. Elle inclut aussi la gestion des erreurs : le logiciel doit être capable de détecter, signaler et, si possible, corriger les erreurs sans compromettre les données.

En matière de performance, l’application doit offrir des temps de réponse rapides et rester performante même en cas d'accès simultané de plusieurs utilisateurs. Les algorithmes de calcul doivent être optimisés pour un traitement efficace des données, ce qui garantit une expérience fluide et sans délais inutiles, contribuant à la satisfaction des utilisateurs et du client.

La **maintenabilité** est également un aspect central de la qualité logicielle. Elle garantit que le code est bien structuré et documenté, ce qui facilite les interventions des développeurs pour des corrections ou des améliorations. Une application facile à maintenir permet d’introduire de nouvelles fonctionnalités et de s’adapter à l’évolution des besoins, tout en minimisant le temps et les coûts de maintenance.

Enfin, la **portabilité** est cruciale pour assurer que l'application puisse fonctionner dans différents environnements, au-delà du Raspberry Pi, tels que des serveurs Linux ou Windows. Cette adaptabilité garantit que l'application peut être utilisée dans divers contextes sans modifications majeures, augmentant ainsi sa valeur et sa flexibilité.



