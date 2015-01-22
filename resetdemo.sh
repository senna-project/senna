#!/bin/bash

if [ ! -z $1 ]
then
    env=$1
else
    env="test"
fi

echo $env

rm -rf $(dirname $0)/app/cache/*

echo "- drop database"
php app/console doctrine:database:drop --force --env=$env || true
echo "- create database"
php app/console doctrine:database:create --env=$env
echo "- create SQL schema"
php app/console doctrine:schema:create --env=$env

echo "- load fixtures in project"
php app/console doctrine:fixtures:load --append --env=$env

#php bin/phpunit -c app
#php bin/behat -vvv
