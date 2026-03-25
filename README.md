<<<<<<< HEAD
<<<<<<< HEAD
# Admin Panel

Ce dossier contient le **panneau d'administration** du projet de réservation de salon ITBeauty.  
Il permet de gérer les réservations, les disponibilités et les notifications email.


**Structure des fichiers**
````
admin/
│
├── admin.php            # Page principale pour gérer les réservations (valider / annuler)
├── login.php            # Page de connexion pour l'administrateur
├── logout.php           # Script pour déconnecter un administrateur
├── index.php            # Page d'accueil du panneau admin après login
├── config.php           # Paramètres de connexion à la base de données
├── dashboard.php        # Tableau de bord avec statistiques et informations globales
├── disponibilites.php   # Gestion des créneaux horaires du salon
├── mail.php             # Envoi d'emails de confirmation ou de notification
├── securite.php         # Fonctions de sécurité, validation et gestion des sessions
└── templates/
    └── email_template.html   # Template HTML pour les emails de confirmation
````

## Fonctionnalités principales

- **Gestion des réservations**  : ````admin.php```` et ````dashboard.php````
  - Valider ou annuler une réservation.  
  - Liste complète des réservations
- Valider une réservation
- Annuler une réservation
- Voir le statut (en attente, confirmé, annulé)

- **Authentification sécurisée**  
- `login.php` → connexion admin  
- `logout.php` → déconnexion + destruction session  
- `securite.php` → vérification session (ouverte ou fermée)
- `config.php` → configuration BDD et identifiants utilisateur
  
  Toutes les pages admin vérifient la session avant accès.


**Notifications email** : ````mail.php````
  
  - Confirmation automatique au client.  
  - Notification au salon pour chaque réservation.  
  - Template HTML professionnel (`templates/email_template.html`)
  
Emails envoyés :
- confirmation au client
- notification au salon

Contenu email :
- nom client
- service
- date
- heure

Variables utilisées (table reservations) :
{{nom_client}}
{{service}}
{{date_rdv}}
{{heure_rdv}}

---
## Accès admin

http://localhost/itbeauty/admin/login.php

Après connexion :

````admin/index.php```` affiche la page de connexion

- **Gestion des disponibilités**  : ````disponibilites.php````
  - Ajouter, modifier ou supprimer les créneaux horaires disponibles via la BDD.
Permet de gérer :

- jour de la semaine
- heure début
- heure fin
- actif / inactif
Table utilisée : disponibilites

- **Sécurité**  
 - session_start obligatoire
- vérification session sur chaque page avec ````securite.php````
- accès admin protégé (identifiant et mot de passe)
- ````logout.php```` détruit la session

---

## Instructions d’utilisation

1. **Connexion** :  
   Accéder à `login.php` pour se connecter en tant qu’administrateur : http://localhost/itbeauty/admin/login.php
   puis saisir les identifiants de connexion

3. **Tableau de bord** :  
   Après login, `index.php` ou `dashboard.php` affiche les réservations et statistiques.

4. **Déconnexion** :  
   Cliquer sur le bouton `Déconnexion` pour fermer la session.

5. **Email** :  
   Les notifications utilisent `templates/email_template.html`. Modifier le template pour changer le style ou le contenu des emails.

---

## Configuration

- Vérifier que `config.php` contient les bonnes informations de connexion à la base de données.  
- Les tables de la BDD (`services`, `reservations`, `disponibilites`) doivent avoir les colonnes nécessaires pour que l’admin panel fonctionne correctement.
  
---

✔ Login admin  
✔ Logout sécurisé  
✔ Gestion réservations  
✔ Gestion disponibilités  
✔ Emails confirmation  
✔ Template HTML email  
✔ Session admin  
✔ Dashboard  
✔ BDD MySQL  
✔ Compatible XAMPP  

# Auteur

Sidibe Aboubakr Sidick et Mustapha-Yacine Antitene
=======
# Documentation de la branche : mail
## Projet : PRJ3_1

Cette branche est dédiée à l'intégration et à la gestion du système d'envoi de courriels au sein de l'application. Elle remplace les méthodes d'envoi standards par une solution plus robuste et compatible avec les serveurs de messagerie modernes.

---

### Architecture du module
La structure est centralisée dans le répertoire des ressources partagées du projet. Elle se compose de deux éléments principaux :

* **Bibliothèque de gestion SMTP** : Intégration de PHPMailer pour assurer la compatibilité avec les protocoles de sécurité actuels.
* **Interface de configuration** : Le fichier mail.php regroupe l'ensemble des paramètres nécessaires à la connexion.

---

### Fonctionnalités implémentées
* **Authentification sécurisée** : Support complet des chiffrements TLS et SSL.
* **Compatibilité HTML** : Capacité à générer des messages structurés avec mise en forme.
* **Gestion des erreurs** : Suivi pour identifier les échecs d'envoi liés au réseau ou aux identifiants.

---

### Guide d'utilisation
1. **Initialisation** : Vérifier la présence du dossier PHPMailer dans le répertoire des inclusions.
2. **Paramétrage** : Éditer les variables d'hôte, de port et les identifiants dans le fichier principal.
3. **Appel du module** : Inclure le fichier de configuration dans les scripts de notification.
>>>>>>> collegue/mail
=======
# 1PRJ3
1PRJ3 (Projet Unité 2 - B1 Ecole-IT)

# Projet ITbeauty: Application Web de Réservation de Services

## Présentation du projet

ItBeauty est une application web de réservation pour un salon de beauté. Elle permet aux clients de réserver des services, et au personnel administratif de gérer les réservations via un espace admin sécurisé.
L’application est développée en PHP avec une base de données MySQL, et utilise XAMPP pour le serveur local. Un système de notifications par email est intégré avec des templates HTML professionnels.

***Ce projet a été réalisé dans le cadre du module 1PRJ3 du Bachelor 1 de l'Ecole-IT de Valenciennes afin de mettre en pratique les notions fondamentales de programmation web côté client et côté serveur.***

## Objectifs pédagogiques

Les principaux objectifs de ce projet sont :

- Comprendre la structure d’une application web simple
- Manipuler HTML et CSS pour la création d’une interface utilisateur
- Utiliser PHP pour traiter les données côté serveur
- Mettre en place une connexion à une base de données MySQL
- Enregistrer et récupérer des informations depuis une base de données
- Utiliser Git et GitHub pour le suivi des versions du projet

## Technologies utilisées

- Visual studio code : environnement de programation
- HTML : structure des pages web
- CSS : mise en forme et design de l’interface
- PHP : gestion de la logique applicative et des réservations
- MySQL : stockage des données (services, disponibilités, réservations)
- XAMPP : environnement de développement local (Apache + MySQL)
- Git / GitHub : gestion de version et partage du projet

## Structure du projet
````
itbeauty/                     # Nom du fichier du projet
│
├─ index.html                 # Page d’accueil / réservation
├─ reservation.php            # Traitement des réservations
├─ style.css                  # Styles CSS du site
├─ connexion.php              # Connexion à la base de données
├─ salon_reservation.sql      # Script SQL pour créer la BDD
│
├─ admin/                     # Dossier Admin
│   ├─ index.php              # Page principale admin (tableau de réservations)
│   ├─ login.php              # Page de connexion admin
│   ├─ logout.php             # Déconnexion
│   ├─ admin.php              # Gestion des actions (valider/annuler)
│   ├─ config.php             # Configuration des identifiants de connexion
│   ├─ dashboard.php          # Page dashboard (statistiques, accueil admin)
│   ├─ disponibilites.php     # Gestion des disponibilités
│   ├─ mail.php               # Envoi d’emails
│   ├─ securite.php           # Gestion des sessions et sécurités
│   └─ templates/
│       └─ email_template.html # Template HTML email
````
## Structure de la base de données SQL
````
┌───────────────┐      ┌───────────────────────┐      ┌─────────────────────┐
│   services    │      │    reservations       │      │   disponibilites    │
├───────────────┤      ├───────────────────────┤      ├─────────────────────┤
│ id  (PK)      │<-----│ service_id  (FK)      │      │ id  (PK)           │
│ nom           │      │ date_rdv              │      │ jour_semaine        │
│ description   │      │ heure_rdv             │      │ heure_debut         │
│ duree_minutes │      │ nom_client            │      │ heure_fin           │
│ prix_euros    │      │ email_client          │      │ actif               │
└───────────────┘      │ telephone             │      └─────────────────────┘
                       |    statut             |   
                        └───────────────────────┘
````
### Installation et utilisation
1. Installer XAMPP (Apache + MySQL + PHP).

2. Copier le dossier itbeauty dans le dossier htdocs de XAMPP  : ````C:\xampp\htdocs\itbeauty````

3.Créer la base de données :
Importer le fichier ````salon_reservation.sql```` via phpMyAdmin.

4. Modifier ````connexion.php````et ````admin/config.php```` si nécessaire pour adapter le nom de la BDD, utilisateur et mot de passe.

5. Lancer XAMPP et démarrer Apache et MySQL.

6. Accéder à l’application :
Client : http://localhost/itbeauty/index.html
Admin : http://localhost/itbeauty/admin/login.php

## Fonctionnalités principales

**Pour les clients:**
- Page de réservation avec choix du service, date et heure.
- confirmation de réservation
- Réception automatique d’un email de confirmation (template HTML avec logo, détails de la réservation).

**Pour l’administrateur:**

- Page login sécurisée
- Gestion des sessions admin.
- Tableau de bord avec toutes les réservations.
- Actions sur les réservations :
Valider ou Annuler
- Déconnexion avec retour à la page d’accueil.
- Email de confirmation au client.
- Email de notification au salon
- Template HTML professionnel (admin/templates/email_template.html) avec logo et informations complètes (client, service, date, heure).
  
# Auteur

Projet réalisé par Aboubakr Sidick Sidibe et Mustapha-Yacine Antitene.
>>>>>>> collegue-master
