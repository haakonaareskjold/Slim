# Slim

1. install composer deps `composer install`
2. migrate database `vendor/bin/doctrine orm:schema-tool:update --force`
3. either run app with docker `docker-compose up -d` or with `composer start`