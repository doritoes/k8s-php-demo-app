# k8s-php-demo-app
LEMP stack demo app designed for k8s demonstration. Pod(s) running this image connect to a separate k8s pod that provides sql-service.

:warning: This is an insecure application deployed over HTTP only. Do NOT use this in production. To learn how to enable HTTPS and add other important configurations, see [trafex/php-nginx](https://github.com/TrafeX/docker-php-nginx), the repo for the NGINX/PHP-FPM image that is used for this application.

This is a basic PHP demonstration web app for use in the Lab exercise at [https://www.unclenuc.com/lab:kubernetes_app:start]. This is a refactoring of the example insecure app at [https://github.com/Sayandeep/Webapp].

[![Docker Pulls](https://img.shields.io/docker/pulls/doritoes/k8s-php-demo-app.svg)](https://hub.docker.com/r/doritoes/k8s-php-demo-app/)
![nginx 1.24](https://img.shields.io/badge/nginx-1.24-brightgreen.svg)
![php 8.3](https://img.shields.io/badge/php-8.3-brightgreen.svg)
![License MIT](https://img.shields.io/badge/license-MIT-blue.svg)
