FROM ubuntu:14.04
ENV DEBIAN_FRONTEND noninteractive

RUN groupadd -f -r www-data
RUN id -u www-data || useradd -r -g www-data www-data
RUN mkdir -p /srv/app && chown -R www-data:www-data /srv/app

VOLUME /srv/app
USER www-data
