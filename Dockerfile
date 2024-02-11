FROM trafex/php-nginx
MAINTAINER doritoes <seth.holcomb@gmail.com>
RUN mkdir -p /var/www/data
USER nobody
COPY --chown=nobody app/ /var/www/html/
COPY --chown=nobody files/ /var/www/data/
# Expose the port nginx is reachable on
EXPOSE 8080
