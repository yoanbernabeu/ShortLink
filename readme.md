# Short Link

Application de réduction de liens à but pédagogique pour la chaine YouTube [YoanDev](https://www.youtube.com/c/yoandevco)

## 👾 Environnement de développement

### 🏁 Pré-requis

* [Symfony CLI](https://symfony.com/download)
* [Docker](https://www.docker.com/)
* [Docker-compose](https://docs.docker.com/compose/install/)
* [PHP 7.4](https://www.php.net/downloads)
* [Composer](https://getcomposer.org/)

### 🔥 Installer le projet en local

Pour les phases de développement, nous utilisons un environnement mixte : Symfony CLI + PHP 7.4 + Docker + Docker-compose

```bash
composer install
docker-compose up -d
symfony serve -d
symfony d:m:m
```

### ✅ Lancer les tests en local

```bash
APP_ENV=test symfony console d:d:c
APP_ENV=test symfony console d:m:m
APP_ENV=test symfony php vendor/bin/phpunit --testdox
```