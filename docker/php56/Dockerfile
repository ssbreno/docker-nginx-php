FROM debian:jessie
maintainer Breno Sobral

RUN apt-get update && apt-get install -y \
		wget 	\
		build-essential 	\
		git 	\
		curl 	\
		gcc 	\
		g++ 	\
		make 
		
RUN apt-get update && apt-get install -y \
		apache2 	\
		apache2-utils 	\
		php5            \
		php5-dev        \
		php-pear        \
		php5-cli 	\
		php5-curl 	\
		php5-gd 	\
		php5-json 	\
		php5-imap 	\
		php5-mcrypt 	\
		php5-mongo 	\
		php5-mssql 	\
		php5-mysql 	\
		php5-pgsql 	\
		php5-xdebug 	\
        php5-redis 	\
        php5-memcached	\
		php5-intl	\
		php5-sqlite     \
		php5-apcu       \
		php5-xmlrpc  

RUN cd /srv

RUN a2enmod php5 && a2enmod rewrite && a2enmod headers && a2enmod expires
    ENV APACHE_RUN_USER www-data
    ENV APACHE_RUN_GROUP www-data
    ENV APACHE_LOG_DIR /var/log/apache2
    ENV APACHE_PID_FILE /var/run/apache2.pid
    ENV APACHE_RUN_DIR /var/run/apache2
    ENV APACHE_LOCK_DIR /var/lock/apache2

RUN apt-get update && \
        apt-get install -y --no-install-recommends git zip   

RUN apt-get update && \
        apt-get install -y --no-install-recommends git unzip   

COPY composer.json /var/www/html

WORKDIR /var/www/html

# Allow Composer to be run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Setup the Composer installer
RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
  && curl -o /tmp/composer-setup.sig https://composer.github.io/installer.sig \
  && php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { unlink('/tmp/composer-setup.php'); echo 'Invalid installer' . PHP_EOL; exit(1); }" \
  && php /tmp/composer-setup.php \
  && chmod a+x composer.phar \
  && mv composer.phar /usr/local/bin/composer

RUN /usr/local/bin/composer install

CMD ["/usr/sbin/apache2", "-D", "FOREGROUND"]

## Expondo Portas TCP
EXPOSE 8082
