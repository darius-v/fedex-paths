# To install

`make init`

# To run

`make start`

#Routes

GET localhost:8000

GET http://localhost:8000/1

# Connection to db:

Host: localhost
Port: 3000
User: root
Pass: notprod

# Commands inside container:

php bin/console make:migration

# Problem solutions:

If gives error that fails to connect to flex.symfony.com, get into container

`make bash`
and run
`composer update symfony/flex --no-plugins --no-scripts
`