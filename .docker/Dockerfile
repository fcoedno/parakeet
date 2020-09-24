FROM php:7.3-cli

WORKDIR /media

RUN apt-get update && apt-get install -y wget git zip unzip libzip-dev

RUN pecl install xdebug zip
RUN echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini


COPY install-composer.sh .
RUN /media/install-composer.sh && rm /media/install-composer.sh
