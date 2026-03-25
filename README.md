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
