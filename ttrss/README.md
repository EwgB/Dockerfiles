# Tiny Tiny RSS Docker image

This is an Docker image of the webapp [Tiny Tiny RSS](http://tt-rss.org).

The version of tt-rss is pinned into the Dockerfile to try to have a stable release.

The Docker image includes the [Feedly theme](https://github.com/levito/tt-rss-feedly-theme).

There are two versions of the image, with a MySQL database and a PostgreSQL database. Postgres is the preferred option according to the TT-RSS developer, and seems to perform much better on weaker hardware.

## Get the image

You can pull the image from the Docker Hub:

```
$ docker pull ewgb/ttrss:postgres
```
or
```
$ docker pull ewgb/ttrss:mysql
```

You can also build the image by cloning this repository and make a `docker build`.



## Configuration

You can configure some values with environment variables:

* `TTRSS_DB_TYPE` : type of the SQL database used (default to `mysql`)
* `TTRSS_DB_HOST` : database hostname or IP (by default initialize with MySQL link)
* `TTRSS_DB_NAME` : database name
* `TTRSS_DB_USER` : database username for ttrss
* `TTRSS_DB_PASS` : database password
* `TTRSS_DB_PORT` : database port (default to `3306`)
* `TTRSS_SELF_URL_PATH` : the full URL of your tt-rss installation
* `TTRSS_FEED_CRYPT_KEY` : key used for encryption of passwords for password-protected feeds in the database. A string of 24 random characters. If left blank, encryption is not used (requires mcrypt functions)



## Runnig webapp

You can use [docker-compose](https://docs.docker.com/compose/) and use the `docker-compose.yml` file provided for running tt-rss.



## Default credential

By default, tt-rss creates a default admin account with these parameters:

* user: admin
* password: password
