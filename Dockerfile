FROM trafex/php-nginx
MAINTAINER doritoes <seth.holcomb@gmail.com>
CMD sed -i "/location ~ \\\.php\\$/i \    location /data/ {\n        internal;\n        deny all;\n    }" /etc/nginx/conf.ddefault.conf
USER nobody
COPY --chown=nobody app/ /var/www/html/
# Expose the port nginx is reachable on
EXPOSE 8080
