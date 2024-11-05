# Arcadia

Arcadia est une application web développée en jQuery et PHP, utilisant des API pour diverses fonctionnalités.

## Prérequis

- Serveur web (Apache, Nginx, etc.)
- PHP (version compatible avec votre code PHP)
- MySQL (ou MariaDB) pour la gestion de la base de données
- phpMyAdmin pour la gestion de la base de données via une interface

## Installation

### 1. Transférer le dossier

1. Téléchargez ou clonez le dossier `arcadia` sur votre serveur web.
2. Assurez-vous que tous les fichiers et sous-dossiers sont bien transférés dans un répertoire accessible par le serveur.

### 2. Configurer la base de données

1. Accédez à **phpMyAdmin** via votre navigateur.
2. Créez une nouvelle base de données avec le nom : `arcadia_zoo`.
3. Importez le fichier `arcadia_zoo.sql`, situé à la racine du dossier `arcadia`, dans la base de données nouvellement créée :
   - Dans phpMyAdmin, sélectionnez la base de données `arcadia_zoo`.
   - Allez dans l'onglet **Importer**.
   - Choisissez le fichier `arcadia_zoo.sql` et démarrez l'importation.

### 3. Configurer les fichiers PHP (si nécessaire)

- Ouvrez les fichiers de configuration (le cas échéant) pour ajuster les paramètres de connexion à la base de données.
- Vérifiez que les paramètres de configuration des API sont corrects et fonctionnels.

### 4. Accéder à l'application

Une fois le dossier correctement transféré et la base de données configurée, vous pouvez accéder à l'application via l'URL de votre serveur, par exemple :
