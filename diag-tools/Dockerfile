FROM alpine:3.5

RUN apk add --no-cache curl && \
    echo -e '#!/bin/sh\necho "Run forever"; while :; do sleep 60s; done' > /usr/local/bin/run-forever && \
    chmod +x /usr/local/bin/run-forever
