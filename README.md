# ResponsiveMySiteWordpress

## Installation

- Create folder ResponsiveMySiteWordpress
- [Download Wordpress](https://fr.wordpress.org/latest-fr_FR.zip) on move into wordpress folder
- create docker-compose.yml
- cd wordpress/wp-content/plugins && git clone https://github.com/poohia/ResponsiveMySiteWordpress.git

## Docker

```
version: "3.9"

services:
  db:
    image: mysql:5.7
    volumes:
      - db_data:/var/lib/mysql
    environment:
      MYSQL_ROOT_PASSWORD: somewordpress
      MYSQL_DATABASE: wordpress
      MYSQL_USER: wordpress
      MYSQL_PASSWORD: wordpress

  wordpress:
    depends_on:
      - db
    image: wordpress:latest
    volumes:
      - ./wordpress:/var/www/html
    ports:
      - "8000:80"
    environment:
      WORDPRESS_DB_HOST: db
      WORDPRESS_DB_USER: wordpress
      WORDPRESS_DB_PASSWORD: wordpress
      WORDPRESS_DB_NAME: wordpress
  phpmyadmin:
    depends_on:
      - db
    image: phpmyadmin/phpmyadmin
    ports:
      - "8080:80"
    environment:
      PMA_HOST: db
      MYSQL_ROOT_PASSWORD: somewordpress
volumes:
  db_data: {}
```
