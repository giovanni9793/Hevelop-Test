# Instruction

Add a .env file with the following variables:

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:jtFUWiiXFhyWnPE2IQcOzyWgESTKLMVRlFM2+k/s4lQ=
APP_DEBUG=true
APP_URL=http://Hevelop-Test.test

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=hevelop_test
DB_USERNAME=sail
DB_PASSWORD=password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=memcached
```

To start the container type the following command in the project directory:

```
$ composer install
$ ./vendor/bin/sail up
```

Then type the following command inside the container named "sail-8.0/app":

```
$ php artisan migrate --seed
```

This command will inizialize the table 'users' and 'categories'.

Now you can navigate to http://localhost to see the site.

The credentials for admin user are:

```
email:      admin@admin.it
password:   password
```
