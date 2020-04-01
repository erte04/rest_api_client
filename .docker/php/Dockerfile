FROM php:7.3-fpm

RUN apt-get update \
    && apt-get install -y --no-install-recommends vim curl debconf subversion git apt-transport-https apt-utils \
    curl
COPY php.ini /etc/php/7.3/php.ini
COPY php-fpm-pool.conf /etc/php/7.3/pool.d/www.conf

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

RUN groupadd dev -g 999
RUN useradd dev -g dev -d /home/dev -m

WORKDIR /home/wwwroot/

EXPOSE 9000
CMD ["php-fpm"]