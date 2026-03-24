# Admin Panel

Ce dossier contient toutes les pages et scripts nécessaires à la gestion administrative du salon (réservations, disponibilités, notifications, etc.).

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

- **Gestion des réservations**  
  - Valider ou annuler une réservation.  
  - Liste complète des réservations avec statut.

- **Authentification sécurisée**  
  - Connexion réservée aux administrateurs.  
  - Gestion des sessions via `login.php` et `logout.php`.

- **Notifications email**  
  - Confirmation automatique au client.  
  - Notification au salon pour chaque réservation.  
  - Template HTML professionnel (`templates/email_template.html`).

- **Gestion des disponibilités**  
  - Ajouter, modifier ou supprimer les créneaux horaires disponibles via la BDD.

- **Sécurité**  
  - Vérification des sessions admin avant accès aux pages sensibles.

---

## Instructions d’utilisation

1. **Connexion** :  
   Accéder à `login.php` pour se connecter en tant qu’administrateur.

2. **Tableau de bord** :  
   Après login, `index.php` ou `dashboard.php` affiche les réservations et statistiques.

3. **Déconnexion** :  
   Cliquer sur le bouton `Déconnexion` pour fermer la session.

4. **Email** :  
   Les notifications utilisent `templates/email_template.html`. Modifier le template pour changer le style ou le contenu des emails.

---

## Configuration

- Vérifier que `config.php` contient les bonnes informations de connexion à la base de données.  
- Les tables de la BDD (`services`, `reservations`, `disponibilites`) doivent avoir les colonnes nécessaires pour que l’admin panel fonctionne correctement.
---
