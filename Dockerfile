FROM trafex/php-nginx
MAINTAINER doritoes <seth.holcomb@gmail.com>
USER nobody
COPY --chown=nobody app/ /var/www/html/
RUN mkdir -p /var/www/data
COPY --chown=nobody files/ /var/www/data/
# Expose the port nginx is reachable on
EXPOSE 8080
