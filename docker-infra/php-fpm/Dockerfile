FROM phpdockerio/php80-fpm:latest
WORKDIR "/app"

RUN apt-get update; \
    apt install libpcre2-16-0 libpcre2-8-0 libpcre2-32-0 \
    apt-get -y --no-install-recommends install \
        php8.0-bcmath \ 
        php8.0-bz2 \ 
        php8.0-ldap \ 
        php8.0-memcached \ 
        php8.0-mysql \
        php8.0-xdebug \
        php8.0-igbinary \
        php8.0-msgpack \
        php8.0-gd \
        php8.0-phar \
        php8.0-redis; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
RUN composer global require --prefer-dist --no-progress --dev "squizlabs/php_codesniffer=*"
RUN composer global require --prefer-dist --no-progress --dev phpmd/phpmd:2.10.1
ENV PATH="/root/.config/composer/vendor/bin:${PATH}"
