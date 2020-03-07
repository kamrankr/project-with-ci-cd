REGISTRY_URL ?= 'kamranadil'
TAG ?= dev

start:
	docker-compose up -d

build-and-start:	
	docker-compose up --build -d

composer-install:
	docker-compose exec -T php bash -c "cd /var/www/html && composer install"

logs:
	docker-compose logs -f

test:
	docker-compose exec -T php bash -c "cd /var/www/html && phpunit --testdox"

## Build nginx image
build-image-nginx:
	@echo "======== Building the nginx image ========"
	docker build -t ${REGISTRY_URL}/nginx:${TAG} -f ./docker/nginx/Dockerfile ./docker/nginx

## push nginx image
push-image-nginx:
	@echo "======== push nginx image ========"
	docker push ${REGISTRY_URL}/nginx:${TAG}

## Build php image
build-image-php:
	@echo "======== Building the php image ========"
	docker build -t ${REGISTRY_URL}/php:${TAG} -f ./docker/php/Dockerfile ./docker/php

## push php image
push-image-php:
	@echo "======== push php image ========"
	docker push ${REGISTRY_URL}/php:${TAG}

#Build all images
build-all-images: build-image-nginx build-image-php

#Push all images
push-all-images: push-image-nginx push-image-php
