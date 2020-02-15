FROM php:7.4-fpm

RUN apt-get update \
    && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y --no-install-recommends apt-utils \
    wget unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN wget -O phpunit https://phar.phpunit.de/phpunit-9.phar \
&& chmod +x phpunit \
&& mv phpunit /usr/local/bin/phpunit

#COPY ./entrypoint.sh /entrypoint.sh
#ENTRYPOINT ["/./entrypoint.sh"]
