# Symfony on Docker

## Rationale

I wanted a setup where I could have one (or more) Nginx containers, handing off
to multiple PHP-FPM containers using a single app data container.

## Usage

1.  [Install Docker and Docker-Compose][docker-compose-install],
2.  Clone the repo,
3.  Run ```docker-compose up```,
4.  In a separate terminal, run ```docker-compose port web 80``` to find the
    host port to use,
5.  Open http://localhost:$port in a browser.

Composed of 5 containers:

1.  phpfpm (x3) - running a single php-fpm instance on port 5000,
2.  nginx - running a single nginx instance exposing port 80 to the host,
3.  app - a data container to be used as a volume in the other instances.

## Learnings

### Use /proc/self/fd/2 for logging

This [writes to Docker's captured output][docker-out].

### Volume ownership is a bit weird

I still don't really get it. The attached volume seems to be owned by
`1001:1001`, so rather than trying to get the volume owned by `www-data` in
the Nginx/PHP-FPM containers, I just ran PHP-FPM as `1001:1001`.

[docker-compose-install]: https://docs.docker.com/compose/install/
[docker-out]: http://serverfault.com/a/661278
