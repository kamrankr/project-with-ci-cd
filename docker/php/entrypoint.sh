#!/bin/bash -e

## Run composer install
composer install && php -S 0.0.0.0:8000
