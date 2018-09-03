# FROM nginx:1.10-alpine

FROM nginx:1.10

RUN openssl dhparam -dsaparam -out /etc/ssl/certs/dhparam.pem 4096

ADD vhost.conf /etc/nginx/conf.d/default.conf

COPY public /var/www/public

