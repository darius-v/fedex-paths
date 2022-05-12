.PHONY: start stop init tests

include .env
export $(shell sed 's/=.*//' .env)

start:
	docker-compose up -d

bash:
    docker exec -it php_paths bash

stop:
	docker-compose stop

# not tested
clear-db:
    docker-compose down -v

init:
	docker-compose build
	docker-compose up -d
	docker-compose exec php composer install
	docker-compose exec php /app/scripts/wait-for-it.sh mysql:$(MYSQL_PORT) -- echo "mysql is up"
	docker-compose exec php php bin/console doctrine:database:create
	#docker-compose exec php php bin/console doctrine:migrations:migrate --no-interaction
	#docker-compose exec php php bin/console doctrine:fixtures:load --no-interaction


tests:
	docker-compose exec php php vendor/bin/phpunit