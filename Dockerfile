FROM trafex/php-nginx

MAINTAINER doritoes <seth.holcomb@gmail.com>

COPY app/ /var/www/html/
# RUN chown -R www-data:www-data /var/www/html/app/

# Expose Ports
EXPOSE 80
