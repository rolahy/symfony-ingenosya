FROM phpdockerio/php80-fpm:latest
WORKDIR "/app"

ENV NODE_VERSION=14.17.0

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

RUN curl -L -o /tmp/nodejs.tar.gz https://nodejs.org/dist/v${NODE_VERSION}/node-v${NODE_VERSION}-linux-x64.tar.gz
RUN tar xfvz /tmp/nodejs.tar.gz -C /usr/local --strip-components=1 && \
    rm -f /tmp/nodejs.tar.gz

RUN npm install yarn -g
