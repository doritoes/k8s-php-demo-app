FROM trafex/php-nginx
MAINTAINER doritoes <seth.holcomb@gmail.com>
RUN mkdir /data
USER nobody
COPY --chown=nobody app/ /var/www/html/
COPY --chown=nobody files/ /data/
# Expose the port nginx is reachable on
EXPOSE 8080
