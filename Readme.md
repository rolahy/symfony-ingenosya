Ingenosya PHP / Symfony Test - Rolahy
=====================================

Ce dépot contient les deux projets `api` et `frontoffice` qui seront respéctivement testable sur le port `http://localhost:4641` et `http://localhost:4642`.

Le projet utilise **Docker** pour faciliter les processus de test mais aussi avoir les mêmes environement que celui lors du développement des fonctionnalitées.

# Comment installer le projet?

### Cloner le projet.
Comme le dépot est pulique, vous pouvez cloner ce dépot sans avoir une accès spécifique:

```
git clone https://github.com/rolahy/symfony-ingenosya.git rolahy-symfony-ingenosya
```

Après cela, veuillez vous rendre dans le nouveau dossier créé qui contient les codes:
```
cd rolahy-symfony-ingenosya
```
### Build des containers
```
docker-compose build --no-cache
```
Après, démarrer toutes les services:
```
docker-compose up -d
```

Après un coup de `docker-compose ps` vous devriez avoir les containers suivants en marche:

Description|Service|Port|Host
------|---------|-----------|-----------
API (PHP 8.0 / Symfony / API Platform / composer / Yarn)|api-php-fpm|9000|
Webserver API|api-server|4641|http://localhost:4641
MySQL 8.0|mysql|3306 (default)|
PhpMyAdmin|pma|5005|http://localhost:5005
Front Office (Symfony / VueJs / composer / Yarn)|front-php-fpm|9000|
Webserver Front Office|front-server|4642|http://localhost:4642
SMTP (Mailhog)|mailhog|1025 (default)

Quand toutes les services sont en marche, veuillez exécuter la commande suivante:

**Installer php-mysql qui n'a pas pu être initialisé dans le Dockerfile (Docker issue)**
````
docker-compose exec api-php-fpm bash
apt update
apt-get install php8.0-mysql
exit
````

Après la commande `exit` vous serez amené à la source du projet (Hors container).
Il est recommandé de relancer le service Nginx de l'API par:
````
docker-compose restart api-server
````
### Installation des composants du projet API
````
docker-compose exec api-php-fpm bash
composer install
yarn install
yarn build
php bin/console doctrine:migration:migrate
exit
````

### Installation des composants du projet FrontOffice
````
docker-compose exec front-php-fpm bash
composer install
yarn install
yarn build
exit
````

A ce niveau, vous pouvez consulter les pages suivantes:
- API: http://localhost:4641
- FrontOffice: http://localhost:4642

 
# Demo
### Excercice 1 - Import d'utilisateurs
**Import succès**
![alt text](https://github.com/rolahy/symfony-ingenosya/blob/develop/demo/exercice-1-import-users.jpg?raw=true)

**Import avec des paramètres manquantes**
![alt text](https://github.com/rolahy/symfony-ingenosya/blob/develop/demo/exercice-1-import-users-missing-parameters-key.jpg?raw=true)

### Excercice 2 - API GET /api/users
**Endpoint**
![alt text](https://github.com/rolahy/symfony-ingenosya/blob/develop/demo/exercice-2-GET-users.jpg?raw=true)

**Payload**
![alt text](https://github.com/rolahy/symfony-ingenosya/blob/develop/demo/exercice-2-GET-users-payload.jpg?raw=true)

### Excercice 3 - FrontOffice `GET http://localhost:4642/{langageDeProgrammation}` (php|symfony|vuejs)
**Endpoint**
![alt text](https://github.com/rolahy/symfony-ingenosya/blob/develop/demo/exercice-3-programming-languages-path.jpg?raw=true)


### Excercice 4 - API Détails utilisateur par `login.uuid`  `GET /api/users/{login.uuid}`
**Endpoint**
![alt text](https://github.com/rolahy/symfony-ingenosya/blob/develop/demo/exercice-4-users-details-by-login-uuid.jpg?raw=true)

**Payload**
![alt text](https://github.com/rolahy/symfony-ingenosya/blob/develop/demo/exercice-4-users-details-by-login-uuid-payload.jpg?raw=true)


### Excercice 5 - FrontOffice Détails utilisant en cliquant sur l'icon "Oeil"
**Actions pour afficher le détails**
![alt text](https://github.com/rolahy/symfony-ingenosya/blob/develop/demo/exercice-3-programming-languages-path.jpg?raw=true)


### Excercice 6 - Evaluation du mot de passe (Non effectué)


### Excercice 7 - API Rechercher d'utilisateur par propriété directe ou sous-propriétés `GET /api/users?{propriety}={value_a}&{propriety.sub_propriety}={value_b}`
**Propriétés possibles**
![alt text](https://github.com/rolahy/symfony-ingenosya/blob/develop/demo/exercice-7-search-users.jpg?raw=true)

### Excercice 7 - API format JSON avec filtres `GET /api/users.json`
**Format JSON**
![alt text](https://github.com/rolahy/symfony-ingenosya/blob/develop/demo/exercice-8-users-json.jpg?raw=true)


**Format XML**
![alt text](https://github.com/rolahy/symfony-ingenosya/blob/develop/demo/exercice-8-users-xml.jpg?raw=true)

