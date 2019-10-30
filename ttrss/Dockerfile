FROM ewgb/nginx-php:php7.0

ARG TTRSS_COMMIT
ARG THEME_FEEDLY_COMMIT

RUN mkdir -p /app \
    && curl -Lv https://git.tt-rss.org/fox/tt-rss/archive/${TTRSS_COMMIT:-master}.tar.gz | tar xz -C /tmp \
    && mv /tmp/tt-rss/* /app \
    && rm -rf /tmp/tt-rss /app/install /app/config.php-dist

RUN mkdir -p /app/themes \
    && curl -Lv https://github.com/levito/tt-rss-feedly-theme/archive/${THEME_FEEDLY_COMMIT:-master}.tar.gz | tar xz -C /tmp \
    && mv /tmp/tt-rss-feedly-theme-*/feedly.css /tmp/tt-rss-feedly-theme-*/feedly /app/themes \
    && rm -rf /tmp/tt-rss-feedly-theme-*

COPY boot-scripts.d /etc/boot-scripts.d
COPY service /etc/service
COPY initialize-database.php /scripts/initialize-database.php

RUN chown -R www-data:www-data /app \
    && find /etc/boot-scripts.d -name "*.sh" -type f -exec chmod +x {} + \
    && chmod u+x /etc/service/ttrss/run \
    && chmod u+x /scripts/initialize-database.php

VOLUME "/app/feed-icons"
VOLUME "/app/cache"
