FROM ewgb/base-runit

RUN export DEBIAN_FRONTEND=nonintieractive; \
    apt-key adv --keyserver hkp://pgp.mit.edu:80 --recv-keys 573BFD6B3D8FBC641079A6ABABF5BD827BD9BF62 \
    && echo "deb http://nginx.org/packages/mainline/debian/ jessie nginx" >> /etc/apt/sources.list \
    && apt-get update \
    && apt-get install -y -q --no-install-recommends \
    ca-certificates \
    curl \
    nginx \
    php5-cli \
    php5-curl \
    php5-fpm \
    php5-gd \
    php5-mcrypt \
    php5-mysql \
    php5-pgsql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY files /

RUN chmod u+x /etc/service/nginx/run \
    && chmod u+x /etc/service/php5-fpm/run \
    && find /etc/boot-scripts.d -name "*.sh" -type f -exec chmod +x {} +

EXPOSE 80
