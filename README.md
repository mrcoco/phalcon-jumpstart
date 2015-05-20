Phalcon Jumpstart
================

## Requirements

- Apache >= 2.0
- PhalconPHP Framwork >=1.3.4
- PHP >=5.4 (extension: Pdo, mbstring, openssl)
- Sphinx Search Engine 2.2.+
- [Link] (http://sphinxsearch.com/)
- [Link] (http://phalconphp.com/)
- libODBC x64 install CentOS: yum install unixODBC unixODBC-devel postgresql-libs (dependencies of SphinxSE)

## Supported Image Libraries

- GD Library (>=2.0)
- Imagick PHP extension (>=6.5.7)

## Supported Crypt Libraries (using for encrypt cookie)

- PHP-mcrypt Extension

## Note Important

- Write database JSON structure need remove "," character at the end of a block object, array.
- Any INTEGER field in database not null, need to Zero (0) if NULL.

## Additional Information

- After run migration task, login with default admin account:
    - Email: admin@fly.com
    - Password: 1

## .gitignore Settings

cache/annotations/*
cache/metadata/*
cache/volt/*
logs/apache/*
logs/app/*
logs/mig/*
public/uploads/*

Documentation
================

## Create missing directory

- View .gitignore setting and create directory map with it.

## Migrate Database

- At the root url of project, open conf/global.php and edit mysql database connection.
- Run following command in shell prompt:
    php cli/cli.php migrate rebuild

## Load JSON Data to DB

- This task will load existed file called data.json stored in migration/ directory.
- Run following command in shell prompt:
    php cli/cli.php migrate load

## Write JSON Data

- After export JSON data from localhost/phpmyadmin, open file migration/data.json and paste the content follow structure:
    {
        "< table_name >": [{< json_data >}]
    }

## Migrate Sphinx Indexes

- Requirement: Sphinx Realtime Daemon started.
- Run following command in shell prompt:
    php cli/cli.php migrate indexes

## Running Sphinx Plain-Indexes

- indexes data stored in /usr/local/var/data/
- mkdir /usr/local/var/run && mkdir /usr/local/var/run/sphinx/ && chmod 777 /usr/local/var/run/sphinx
- mkdir /usr/local/var/log/ && mkdir /usr/local/var/log/sphinx && chmod 777 /usr/local/var/log/sphinx
- mkdir /var/data && chmod 777 /var/data (for CentOS)
- indexer --config conf/sphinx.conf --all
- searchd --config conf/sphinx.conf
- indexer --config conf/sphinx.conf --rotate --all (Re index)

## Runnig Restful API test

- php api_test/client_connect.php newpj.com/api/
- return "pong" is Success.

## Running & Query Realtime-Indexs with SphinxQL Builder

- Renew RT indexes: remove file *.meta
- Run daemon: searchd --config conf/sphinx-realtime.conf
- PHP SphinxQL Builder: [Link] (https://github.com/FoolCode/SphinxQL-Query-Builder)

## Sphinx Realtime Index Backup

- tar zcvf ~/PHP/fly_manga_rt.tar.gz /usr/local/var/data/fly_manga.{*.sp*,ram,kill,meta}  /usr/local/var/data/binlog.*

## SphinxQL connect command line

- [Link] (http://sphinxsearch.com/docs/current.html#sphinxql-flush-ramchunk)
- CONNECT: mysql -h 0 -P 9306 --protocol=tcp --prompt='sphinxQL>'
- CLEAR DATA: TRUNCATE RTINDEX < index-name >
- CHECK STATUS OF A INDEX: SHOW INDEX < index-name > STATUS;

