FROM ewgb/base-runit

RUN export DEBIAN_FRONTEND=nonintieractive; \
    apt-get update \
    && apt-get install -y -q --no-install-recommends curl \
    && curl -s http://nginx.org/packages/keys/nginx_signing.key | apt-key add - \
    && echo "deb http://nginx.org/packages/mainline/debian/ jessie nginx" >> /etc/apt/sources.list \
    && apt-get update \
    && apt-get install -y -q --no-install-recommends \
        ca-certificates \
        nginx \
    && echo "deb http://packages.dotdeb.org jessie all" > /etc/apt/sources.list.d/dotdeb.list \
    && curl -s https://www.dotdeb.org/dotdeb.gpg | apt-key add - \
    && apt-get update \
    && apt-get install -y -q --no-install-recommends \
        php7.0-cli \
        php7.0-curl \
        php7.0-fpm \
        php7.0-gd \
        php7.0-mbstring \
        php7.0-mcrypt \
        php7.0-mysql \
        php7.0-pgsql \
        php7.0-xml \
        php7.0-intl\
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY files /

RUN chmod u+x /etc/service/nginx/run \
    && chmod u+x /etc/service/php7-fpm/run \
    && find /etc/boot-scripts.d -name "*.sh" -type f -exec chmod +x {} +

EXPOSE 80
