#!/bin/bash
cd src 

docker run --rm -v $(pwd):/app composer/composer:latest install

docker run --rm -v $(pwd):/var/www -w /var/www php:7.2 vendor/bin/phpunit --bootstrap autoload.php tests/GameTest.php