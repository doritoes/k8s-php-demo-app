FROM trafex/php-nginx
MAINTAINER doritoes <seth.holcomb@gmail.com>
RUN mkdir /var/data
USER nobody
COPY --chown=nobody app/ /var/www/html/
COPY --chown=nobody files/ /var/data/
# Expose the port nginx is reachable on
EXPOSE 8080
