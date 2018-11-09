# Docker-build-slimphp

Docker container based on `Debian:jessie` version. Using `apache` version with `php 5.6`. A sample way to build a project with docker and Slim Framework to construict API with SlimPHP. That is for my own personal purpose.

If you wanna help me to improve it, contact me <ssobralbreno@gmail.com>.

## Includes packages

 * apache
 * composer
 * SlimPHP 3x 
 * php 5.6 (redis, cli, mysql, apc, curl, gd, intl, mcrypt, mbstring, memcache, memcached, sqlite, tidy, xmlrpc, xsl, pgsql, mongo, ldap)

## Informations

This is configuration for you run your first API with Docker and Docker-Compose, in the file `DB.php` is a configuration EXAMPLE to you apply your First Database Connect with Slim.
Some easily configurations are done to.

### Explanations

Check usage section and see explanations

 1. You need to install Docker and Docker-Compose, use command `docker-compose build` to build the Dockerfile.
 2. Write `docker-compose up -d` to setup the container.
 3. After that u can acess the url `0.0.0.0:8082/hello/Test` to test and go study.

```
 CONTAINER ID        IMAGE                  COMMAND                  CREATED             STATUS              PORTS                    NAMES
fa55b47b76e1        docker-build-slimphp   "php -S 0.0.0.0:8082…"   3 minutes ago       Up 3 minutes        0.0.0.0:8082->8082/tcp   docker-build-slimphp
```

### Test

1. Go in 0.0.0.0:8082 and test the example route in `routes.php` 0.0.0.0:8082/hello/Test
2. To test the database connection you need to build in Dockerfile a MySQL or Postgresql and acess that.
3. Afterthat you setup that in `routes.php` to acess the route.

Reminder that is for educational purpose the example don't include a Token Validation.

Checkout more informations in https://www.slimframework.com/docs/