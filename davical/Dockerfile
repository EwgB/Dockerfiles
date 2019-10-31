FROM ewgb/nginx-php:php5.6

RUN export DEBIAN_FRONTEND=nonintieractive; \
    apt-get update \
    && apt-get install -qy --no-install-recommends davical \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY files /
