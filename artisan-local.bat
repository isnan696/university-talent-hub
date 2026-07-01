@echo off
php -d extension=mbstring -d extension=openssl -d extension=pdo_sqlite -d extension=sqlite3 -d extension=fileinfo artisan %*
