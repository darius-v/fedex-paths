# To install

`make init`

# To run

`make start`

#Routes

GET localhost:8000

GET http://localhost:8000/1

# Rum db migration:

`docker-compose exec php php bin/console doctrine:migrations:migrate --no-interaction`

# Connection to db:

Host: localhost
Port: 3000
User: root
Pass: notprod

# Commands inside container:

`php bin/console make:migration`
`bin/console doctrine:migrations:generate`
`php bin/console doctrine:migrations:migrate`

Revert last migration:
`php bin/console doctrine:migrations:migrate prev`

# Problem solutions:

If gives error that fails to connect to flex.symfony.com, get into container

`make bash`
and run
`composer update symfony/flex --no-plugins --no-scripts
`