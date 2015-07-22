FROM ubuntu:14.04
ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && apt-get -y upgrade

# Create www-data
RUN groupadd -f -r www-data
RUN id -u www-data || useradd -r -g www-data www-data
RUN mkdir -p /srv/app && chown -R www-data:www-data /srv/app

# Install PHP-FPM
RUN apt-get -y install php5-fpm php5-sqlite php5-gd php5-curl

# Configure PHP-FPM
RUN rm /etc/php5/fpm/pool.d/www.conf
ADD php-fpm.conf /etc/php5/fpm/php-fpm.conf
ADD app.conf /etc/php5/fpm/pool.d/app.conf

ENTRYPOINT ["php5-fpm", "--nodaemonize"]

EXPOSE 5000
