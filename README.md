# Gestion Flextory

## Installation

### Base de donnée

Il faut lier le projet avec une base de données vide, le nom de cette base de données sera à renseigner dans la partie "DB_DATABASE".

Modifier le fichier d'environnement (.env) :
- APP_URL
- DB_HOST
- DB_PORT
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

### Commandes

- `composer install`

- `npm ci`

- `php artisan migrate`

- `php artisan storage:link` -> pour faire le file storage et placer les images de storage/app/public dans public/storage

## Utilisation

Pour lancer le serveur Laravel : `php artisan serve`

Pour lancer la compilation une fois : `npm run build`

Pour lancer la compilation à chaque modification : `npm run dev` / `npm run watch`
