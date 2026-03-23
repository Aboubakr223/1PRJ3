# 1PRJ3
1PRJ3 (Projet Unité 2 - B1 Ecole-IT)

# Projet : Application Web de Réservation de Services

## Présentation du projet

Ce projet consiste à développer une application web simple complète de réservation de services pour le salon IT-Beauty (coiffure, esthétique ou autre type de prestation).
L’objectif est de permettre à un utilisateur de consulter les services proposés, sélectionner un créneau horaire disponible et effectuer une réservation en ligne.
Il permet aussi aux administrateurs du salon à consulter et gérer les rendez-vous.

Les réservations sont enregistrées dans une base de données relationnelle, ce qui permet de gérer les disponibilités et d’éviter les conflits d’horaires.

Ce projet a été réalisé dans le cadre du module 1PRJ3 du Bachelor 1 de l'Ecole-IT de Valenciennes afin de mettre en pratique les notions fondamentales de programmation web côté client et côté serveur.

## Objectifs pédagogiques

Les principaux objectifs de ce projet sont :

- Comprendre la structure d’une application web simple
- Manipuler HTML et CSS pour la création d’une interface utilisateur
- Utiliser PHP pour traiter les données côté serveur
- Mettre en place une connexion à une base de données MySQL
- Enregistrer et récupérer des informations depuis une base de données
- Utiliser Git et GitHub pour le suivi des versions du projet

## Technologies utilisées

- HTML : structure des pages web
- CSS : mise en forme et design de l’interface
- PHP : gestion de la logique applicative et des réservations
- MySQL : stockage des données (services, horaires, réservations)
- XAMPP : environnement de développement local (Apache + MySQL)
- Git / GitHub : gestion de version et partage du projet

## Structure du projet
````
itbeauty/
│
├── index.html
├── reservation.php
├── connexion.php
├── style.css
├── salon_reservation.sql
└── README.md
````
### Description des fichiers

- **index.html** : 
Page d’accueil du site. Elle présente le service et permet d’accéder au système de réservation.

- **reservation.php**:
Script PHP chargé de gérer la réservation : affichage des créneaux disponibles, traitement des données envoyées par l’utilisateur et enregistrement des réservations dans la base de données.

-**connexion.php**:
Fichier permettant d’établir la connexion entre l’application PHP et la base de données MySQL.

- **style.css**:
Feuille de style utilisée pour la mise en forme visuelle du site.

- **salon_reservation.sql**:
Fichier contenant la structure et le script SQL de la base de données utilisée par l’application.
````
+-------------+        +----------------+        +-------------+
|   clients   |        |  reservations  |        |  services   |
+-------------+        +----------------+        +-------------+
| id_client PK|<------ | id_client  FK  | -----> | id_service PK|
| nom         |        | id_service FK  |        | nom_service  |
| email       |        | id_reservation |        | duree        |
+-------------+        | date_reservation       | prix         |
                       | heure_reservation      +-------------+
                       +----------------+
````
### Installation et utilisation
1. Installation du projet

Placer le dossier du projet dans le répertoire :
````
C:\xampp\htdocs\
````
2. Démarrer le serveur local

Lancer XAMPP puis démarrer :
Apache + MySQL

3. Importer la base de données:
- Ouvrir phpMyAdmin
- Créer une base de données
- Importer le fichier :
````
salon_reservation.sql
````
4. Lancer l’application
Ouvrir le navigateur et accéder à :
````
http://localhost/itbeauty/index.html
````
## Fonctionnalités principales

- Consultation des services disponibles et des crénaux horaires
- Sélection d’un créneau horaire
- Enregistrement des réservations dans la base de données
- Vérification des disponibilités pour éviter les double-réservations
  
# Auteur

Projet réalisé par Aboubakr Sidick Sidibe et Mustapha Antitene.
