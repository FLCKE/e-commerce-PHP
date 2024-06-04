
# e-maillot Admin

Ce projet est un tableau de bord administrateur pour le site e-maillot. Il permet aux administrateurs de gérer les membres, les produits, les promotions, les contacts du service client, et offre une vue d'ensemble des fonctionnalités principales.

## Prérequis

- Serveur web (apache, ou php serve)
- PHP 7.x
- Base de données MySQL

## Installation

1. Cloner le dépôt : `[git clone (https://github.com/FLCKE/e-commerce-PHP.git)]`

2. Importer la base de données à partir du fichier fourni (`database.sql`) dans une base de donnée renommé maillot_db.


## Utilisation

1. Exécuter le serveur web .
2. Accéder à l'application dans le navigateur : `http://localhost/e-commerce-PHP/userside/back-end/temp/admin.php`

## Fonctionnalités

- Affichage du tableau de bord administrateur.
- Navigation entre les sections : Membres, Produits, Promotion, Service Client.
- Gestion des membres, produits, promotions et contacts du service client.
- Possibilité de se déconnecter via le bouton "Logout".

## e-maillot user
##Fonctionnalités
Authentification Utilisateur : L'application garantit l'authentification de l'utilisateur en vérifiant une session active. Les utilisateurs sont redirigés vers la page de connexion s'ils ne sont pas connectés.

Accès Basé sur les Rôles : L'accès est restreint en fonction des rôles des utilisateurs. Seuls les utilisateurs avec le rôle 'user' peuvent accéder au contenu principal, tandis que les autres sont redirigés vers une page d'accès refusé.

Interaction avec la Base de Données : L'application se connecte à une base de données pour récupérer les informations de l'utilisateur en utilisant des déclarations préparées. Les erreurs liées à la base de données sont gérées et affichées comme des messages d'erreur appropriés.

Design Responsive : Bootstrap est utilisé pour la mise en forme, offrant un design réactif et visuellement attrayant qui s'adapte à différentes tailles d'écran.

Navigation : La barre de navigation inclut des liens vers la page d'accueil, la liste des produits, l'historique des commandes et la page de contact. Elle comporte également une icône de panier d'achats et une icône de profil utilisateur.

Fonctionnalité de Recherche : Les utilisateurs peuvent rechercher des produits en sélectionnant une catégorie dans le menu déroulant et en soumettant le formulaire de recherche.
## Utilisation
Page d'Accueil :

Après une connexion réussie, les utilisateurs sont redirigés vers la page d'accueil où un message de bienvenue est affiché.
Navigation :

Les utilisateurs peuvent naviguer à travers différentes sections en utilisant les liens de la barre de navigation.
Recherche de Produits :

Utilisez la fonctionnalité de recherche pour trouver des produits en fonction des catégories sélectionnées.
Affichage de Contenu :

Le contenu des fichiers 'get1.php' et 'get2.php' est inclus sur la page d'accueil, affichant des informations sur les produits.
Voir Plus :

Les utilisateurs peuvent cliquer sur les boutons "Voir plus" pour explorer davantage de produits.
Profil Utilisateur et Panier :

Accédez au profil utilisateur et au panier d'achats via les icônes de la barre de navigation.
