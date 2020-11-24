# Projet de Technique Web
Projet PHP du [Laboratoire de Technique Web](https://moodle.henallux.be/course/view.php?id=3083), 2020.

Ce projet est réalisé dans le cadre d'un cours de 3ème lors de mes études au sein de l'IESN.

## Objectif
Le but du projet consiste à créer un site web qui permettrait d'évaluer des étudiants à l'aide d'un questionnaire type QCM.

## Technologies employées
Le site sera hébergé sur un serveur web Apache et sera en https.

Une base de données reprendra toutes les informations nécessaires pour l'authentification, aussi bien des professeurs que des élèves, et pour passer l'évaluation.

La gestion des sessions sera effectuée en PHP.

Le site sera habillé avec des feuilles de style CSS.

## Fonctionnlaités
* Page de connexion
* Page d'accueil affichant
  * pour les élèves : les examens à présenter et les examens terminés
  * pour les professeurs : les élèves n'ayant pas passé l'examen, les élèves qui l'ont passé et les élèves en train de le passer
* Différents QCM en fonction des matières à présenter
* QCM avec 4 propositions + "Je ne sais pas"
* Calcul de la note selon la règle +1/0/-0,5
* Questions du QCM sélectionné de façon aléatoire parmi les questions disponibles
* Réponses ordonnées de façon aléatoire **mais** la proposition "Je ne sais pas" toujours en dernière position
* Accès à un correctif après l'évaluation

## Fonctionnalités à confirmer
* Décompte pour terminer l'évaluation
* Hachage des mots de passe
* Graphique avec résultats

D'autres fonctionalités pourraient s'ajouter en fonction du temps restant pour rendre le projet ainsi qu'au fil de mes envies.
