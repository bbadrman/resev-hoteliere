# SITE_NAME

SITE_NAME website with docker, drupal 9.2, Apache, MySQL and phpmyadmin.


## Main Configuration

### Configure docker containers

In docker >> docker-compose.yml find replace test by project name and change all the port for web, db & phpmyadmin.


### Install Dependencies :

```
docker-compose exec web bash
composer install
```


### Configure Xdebug

1. In PhpStorm go to: File | Settings | PHP | Debug, in Xdebug >> Debug port enter the port number (9010 for example).
2. Click on ADD Configurations (next phone symbole):
  - In left of pop-up window click on + and choose PHP Remote Debug;
  - Enter Name: Localhost (for example);
  - Check: Filter debug connection by IDE key;
  - In Server click in: ...;
  - In left off the pop-up window click on +;
  - Enter Localhost for Name (for example);
  - Enter Localhost for Host,
  - Enter the port number (check the web port in docker-compose);
  - Select Use path mappings;
  - in Project files >> got to your project root path >> next src enter: /var/www/html;
  - Click: Apply.
3. Download the [Xdebug helper](https://chrome.google.com/webstore/detail/xdebug-helper/eadndfjplgieldjbigjakmdgkmoaaaoc) (Google Chrome extension) and in options >> IDE key copy "PHPSTORM".
4. Back in Run/Debug Configuration in IDE key(session id) enter the copied IDE key (PHPSTORM) then click Apply.
5. In Menu >> Run >> select : Break at first line in PHP scripts.
6. Click on the phone symbole until it change to green and in browser click on Xdebug helper until it change to green also
7. Go to your home page website and click f5 to refresh.
8. Finally, in Run >> uncheck : Break at first line in PHP scripts.


### Configuring the Database :

The database connection information is stored as an environment variable called DATABASE_URL. 
For development, you can find and customize this inside app >> .env:

```
# to use mysql:
DATABASE_URL="mysql://yassine:123456@db:3306/my_cabinet_db?serverVersion=8.0.27"
```


### Installing Doctrine :

```
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
```


### Install the Profiler

`composer require --dev symfony/profiler-pack`


### Adding Rewrite Rules

The easiest way is to install the apache Symfony pack by executing the following command: `composer require symfony/apache-pack`
> Note: for more information check: [web server configuration](https://symfony.com/doc/current/setup/web_server_configuration.html).


## Main Tasks

To do ...

###[for-16] 8. Comprendre Doctrine interagir avec le cycle de vie des Entités

dans cette tach en install le slugify  a l'aide du cmd :composer require cocur/slugify
 et en cree une fonction qui initialise le slug chaque fois quand a besoin

  ###[for-24 ] 11. Comprendre le ParamConverter de Symfony 4

     grace a injection independance en peut aussi filer les objets quand a besoin

     ##use Symfony\Component\Validator\Constraints as Assert;
     pour la validation du champ 

## @UniqueEntity(   pour eviter les doubleaux 

## login et logout
  pour assurer la connexion du login il faut oblicatoir de modifie dans security.yaml les parametre suivant: provider: in_database

            form_login: 
                login_path: account_login
                check_path: account_login

            logout:
                path: account_logout
                target: account_login

Error An error has occurred resolving the options of the form "Symfony\Component\Form\Extension\Core\Type\TextType": The option "widget" does not exist. Defined options are: "action", "allow_extra_fields", "allow_file_upload", "attr", "attr_translation_parameters", "auto_initialize", "block_name", "block_prefix", "by_reference", 

solution: ajouter DateType in form type

An error has occurred resolving the options of the form "Symfony\Component\Form\Extension\Core\Type\DateType": The option "widget" with value "signle_text" is invalid. Accepted values are: "single_text", "text", "choice".

solution: il éte une error ortographe au signle 

### PaginationService

- il faut metre cet servcie il est montener en PaginationService.php
- apres il faut cree une templet pagination.html.twig
- apres modifie dans service.yaml
    App\Service\PaginationService:
        arguments:
            $templatePath: 'admin/partiels/pagination.html.twig'

 ### Webpack configuration

     necessary to configure the webpack.config.js file with  deplaced fold in asset dort de la projet  and remplaire le fichier app.js.

     afin de minimise les fichier pour avoir une site web souple au cours de navigation en phase production


     Problem 1 - cocur/slugify is locked to version v4.0.0 and an update of this package was not requested. - cocur/slugify v4.0.0 requires ext-mbstring * -> it is missing from your system. Install or enable PHP's mbstring extension.

### ( ! ) Parse error: syntax error, unexpected '|', expecting variable (T_VARIABLE) in /var/www/html/vendor/psr/log/src/LoggerInterface.php on line 30 site:stackoverflow.com  

soulution :le probleme a resoulus suivant de copie le meme fichier composer.json sur github sur une branch propre  et apres en "composer install" mais dans le container 

###Your requirements could not be resolved to an installable set of packages

soulution  : il faut entrer au container docker docker

### warning:require_once(/var/www/html/autoload_runtime.php):failed to open stream:no such fils or directory in var/www/html/public/index.php on line 5
soulution : il fau entrer au container docker parceque le chemin n'esp pas priser et installer les independance compose qui monquant pour avoir le fichier vendor 