start:
	docker-compose up -d

build-and-start:	
	docker-compose up --build -d

composer-install:
	docker-compose exec php bash -c "cd /var/www/html && composer install"

logs:
	docker-compose logs -f

test:
	docker-compose run php bash -c "cd /var/www/html && phpunit --testdox"
