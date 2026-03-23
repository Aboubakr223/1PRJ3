# Analyse du besoin, concurentiel et cahier des charges du salon de coiffure IT Beauty

## Présentation du projet et problème résolu

Un salon de coiffure IT-Beauty souhaite moderniser sa prise de rendez-vous et offrir à ses clients la possibilité de réserver en ligne 24h/24.
Actuellement, le salon utilise uniquement la réservation par téléphone, ce qui entraîne plusieurs problèmes :
- perte de temps pour répondre aux appels
- impossibilité de réserver en dehors des horaires d’ouverture
- erreurs dans la prise de rendez-vous
- mauvaise organisation des créneaux
Le site web permettra de moderniser le fonctionnement du salon et d’améliorer l’expérience client.

## Public cible

Le public cible est composé de :
- clients réguliers du salon
- nouveaux clients souhaitant réserver rapidement
- personnes habituées à utiliser Internet pour prendre rendez-vous
  
Caractéristiques du public :
- âge : 18 – 60 ans
- utilise smartphone ou ordinateur
- souhaite réserver rapidement
- préfère éviter les appels téléphoniques

Besoins principaux : 
- voir les services disponibles
- connaître les prix
- voir les horaires
- réserver facilement
- recevoir une confirmation par e-mail
  
## Analyse du besoin

Le salon IT Beauty a besoin d’un système permettant :
- d’afficher les services proposés
- de gérer les horaires d’ouverture
- d’éviter les doubles réservations
- de consulter les rendez-vous
- de modifier ou supprimer un rendez-vous
  
Fonctionnalités nécessaires :
- page vitrine
- formulaire de réservation
- choix de la date et de l’heure
- enregistrement en base de données
- interface administrateur simple
- notifications par e-mail pour client et administrateur
  
## Analyse concurrentielle 
De nombreux salons utilisent déjà des systèmes de réservation en ligne comme :
Planity
Treatwell

Ces solutions sont efficaces mais parfois :
- trop complexes
- trop chères pour les petits salons
- difficiles à personnaliser
Le projet proposé vise à créer une solution :
- plus simple
- adaptée à un petit salon
- facile à utiliser
- gratuite ou peu coûteuse

## Scénarios d'utilisation

Cas 1 - Client régulier
Nom : Karim
 Âge : 20 ans
 Profession : étudiant
 Habitudes : utilise souvent son téléphone pour réserver
Besoins :
- réserver rapidement
- voir les horaires disponibles
- éviter d’appeler
Objectif :
- Prendre rendez-vous en moins de 1 minute
  
Cas 2 - Client occasionnel
Nom : Sophie
 Âge : 42 ans
 Profession : employée
 Habitudes : préfère organiser à l’avance
Besoins :
- voir les prix
- choisir le service
- être sûre du rendez-vous
Objectif : Pouvoir réserver le soir ou le week-end

Cas 3 – Gérant du salon
Nom : Diallo
 Âge : 50 ans
 Profession : coiffeur
Besoins :
- voir tous les rendez-vous
- éviter les erreurs
- gagner du temps
- ne pas répondre au téléphone toute la journée
Objectif : Avoir un planning clair et organisé

## Cahier des charges 
Objectif : dire exactement ce que le site doit faire
#### Page vitrine
- Présentation du salon (nom, description, photos)
- Liste des services proposés avec durée et prix
- Horaires d'ouverture par jour de la semaine
- Coordonnées et localisation (adresse, téléphone)
- Témoignages clients (optionnel mais valorisé)
#### Système de réservation
- Sélection du service dans une liste déroulante
- Calendrier interactif montrant les créneaux disponibles
- Affichage en temps réel des disponibilités
- Formulaire client : nom, prénom, email, téléphone
- Validation côté client et serveur des données
- Confirmation immédiate avec récapitulatif
- Gestion des conflits
- Vérification en temps réel de la disponibilité
- Empêcher la double réservation du même créneau
- Gestion des services de durées différentes
- Blocage automatique des créneaux réservés
#### Notifications email
- Email de confirmation automatique au client
- Email de notification au salon
- Template HTML professionnel avec logo
- Informations complètes : service, date, heure, client
#### Interface administration
- Connexion sécurisée (login/password)
- Vue agenda complète avec toutes les réservations
- Possibilité de valider/annuler une réservation
- Ajout/modification des créneaux de disponibilité
- Gestion des services (nom, durée, prix)

#### Contraintes techniques
- PHP
- MySQL
- HTML / CSS / JS
- site simple, pas d’application mobile

## Conclusion

Le développement d’un système de réservation en ligne permettra :
- d’améliorer l’organisation du salon
- de faciliter la réservation pour les clients
- de moderniser le service
- de réduire les erreurs
Le projet répond à un besoin réel et peut être réalisé avec des technologies web simples.


#### Utilisateurs
- client
- administrateur


