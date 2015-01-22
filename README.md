Senna
========

[![Build Status](https://travis-ci.org/senna-project/senna.svg)](https://travis-ci.org/senna-project/senna)

Home automation project, based on the [**Symfony2**](http://symfony.com) framework.

Installation
------------

Requirements:

* [Git](http://git-scm.com/)
* [Composer](http://getcomposer.org)
* PHP 5.4 or better

``` bash
$ git clone https://github.com/senna-project/senna
$ cd senna
$ composer install
```

Then configure your project and create database.

``` bash
$ cd senna

# To create the database:
$ php app/console doctrine:database:create
$ php app/console doctrine:schema:create

# If you want to load sample data, use the following command
$ php app/console doctrine:fixtures:load

# Developper ( NodeJs and Npm required)
$ npm install
$ bower install
$ gulp


```

You probably need to setting up rights for apache, uses the following commands:

```bash
$ mkdir -p app/cache app/logs app/data web/uploads
$ setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs app/data web/uploads
$ setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs app/data web/uploads
```

[Behat](http://behat.org) scenarios
-----------------------------------

You need to copy Behat default configuration file and enter your specific ``base_url``
option there. Nothing to change if you use `app/console server:run`.

```bash
$ cp behat.yml.dist behat.yml
$ vim behat.yml
```

Then download [Selenium Server](http://seleniumhq.org/download/), and run it.

```bash
$ java -jar selenium-server-standalone-2.11.0.jar
```

You can run Behat using the following command.

``` bash
$ bin/behat
```

Troubleshooting
---------------

If something goes wrong, errors & exceptions are logged at the application level.

````
tail -f app/logs/prod.log
tail -f app/logs/dev.log
````

Docker
------

You can build a docker image for this project with the following command:

```
docker build -t senna .
```

Then run the container:

```
docker run -p 80:80 -p 8000:8000 senna
```

or with your current working copy:

```
docker run -p 80:80 -p 8000:8000 -v $(pwd):/var/www/senna senna
```

Senna should now be available at http://localhost/