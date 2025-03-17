# **Dossier de tests**

# **1\. Introduction**

Ce document a pour but de montrer le fonctionnement de notre site web. Ce dossier a pour objectif de montrer différents tests effectués.

# **2\. Description de la procédure de test**

Dans ce dossier de test nous avons recensé les tests boites blanches  et boîtes noires  requis afin de vérifier le fonctionnement du site.  
Pour chaque fonction nous avons fait des partitions d’équivalences que nous avons utilisées pour créer nos tests.

# **3\. Description des informations à enregistrer pour les tests**

## **1\. Campagne de test**

| Produit testé : Site web                                                                                                |                         |
|:------------------------------------------------------------------------------------------------------------------------|:------------------------|
| Date de début :10/03/2025                                                                                               | Date de fin :30/03/2025 |
| Test à appliquer : base de données, connexion, inscription, calcul de proba, logs, chiffrage                            |                         |
| Responsable de la campagne de test : Dangeul Ethan, Camara Blomkoum, Arsene Maxence, Marouan Hazim-Rayan, Leblond Roméo |                         |

# 

## **2\. Tests**

| Identification du test : Chiffrage/Déchiffrage                             | Version :1.0 |
|:---------------------------------------------------------------------------| :---- |
| Description du test : Chiffre un texte                                     |  |
| Ressources requises : a le message initial, b la clé, c le message chiffré |  |
| Responsable : Arsene Maxence                                               |  |

| Classe | A | B | Résultat Attendu |
| :---: | :---: | :---: | :---: |
| P1 | A \= text | B \= clé | C \= le message chiffré |

| Identification du test : BD\_isValidAccount                                                                              | Version :1.0 |
|:-------------------------------------------------------------------------------------------------------------------------| :---- |
| Description du test : Vérifier si un couple login/mdp correspond bien à un compte dans la BD / Test d’intégration mysqli |  |
| Ressources requises : A le login et B le mot de passe                                                                    |  |
| Responsable : Arsene Maxence /Ethan Dangeul                                                                              |  |

| Classe | A | B | Résultat Attendu |
| :---: | ----- | ----- | :---: |
| P1 | Présent dans la bd | Mot de passe valide | True |
| P2 | Présent dans la bd | Mot de passe invalide | False |
| P3 | Absent dans la bd |                    \- | False |

# 

## **3.Résultat de test**

| Référence du test appliqué : Chiffrage | Responsable : Arsene Maxence |
| :---- |:-----------------------------|
| Date de l’application du test : 17/03/2025 |                              |
| Résultat du test : OK |                              |
| Occurrences des résultats : systématique |                              |

| Classe | a | b | Résultat attendu | Résultat observé | Résultat |
| :---: | :---: | ----- | :---: | :---: | :---: |
| P1 | Plaintext |        Key  | BBF316E8D940AF0AD3 | BBF316E8D940AF0AD3 | ok |

| Référence du test appliqué : BD\_isValidAccount | Responsable : Arsene Maxence / Dangeul Ethan |
| :---- | :---- |
| Date de l’application du test : 17/03/2025 |  |
| Résultat du test : OK |  |
| Occurrences des résultats : systématique |  |

commentaire :   
toto est présent dans la base de donnée son mot de passe est titi  
tata n’est pas présent dans la base de donnée

| Classe | a | b | Résultat attendu | Résultat observé | Résultat |
| :---: | :---: | ----- | :---: | :---: | :---: |
| P1 | toto |        titi  | True | True | ok |
| P2 | toto | tete | False | False | ok |
| P3 | tata |   \- | False | False | ok |