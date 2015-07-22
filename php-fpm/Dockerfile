FROM ubuntu:14.04
ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && apt-get -y upgrade

# Ensure www-data has uid:1001,gid:1001
RUN groups | grep www-data && groupdel www-data || true
RUN id -u www-data && userdel www-data || true

# Create www-data
RUN groupadd --system --gid 1001 www-data
RUN useradd --system --gid 1001 --uid 1000 www-data

# Install PHP-FPM
RUN apt-get -y install php5-fpm php5-sqlite php5-gd php5-curl

# Configure PHP-FPM
RUN rm /etc/php5/fpm/pool.d/www.conf
ADD php-fpm.conf /etc/php5/fpm/php-fpm.conf
ADD app.conf /etc/php5/fpm/pool.d/app.conf

ENTRYPOINT ["php5-fpm", "--nodaemonize"]

EXPOSE 5000
