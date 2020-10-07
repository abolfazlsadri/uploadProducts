# Upload products

> [PHP](https://php.net) API for an Upload products service with mysql and redis queue.

## Task Description:
  - Implement a upload product system API.
  - An API for a control panel system for the administrators.
  - The users are authenticated using a role-permission system which decides
     whether the user is an admin, a regular customer .

# Installation

Install the dependencies and start the server to test the Api.

```sh
$ Composer install
$ php artisan key:generate
$ php artisan migrate
$ php artisan passport:install
$ php artisan db:seed
$ php artisan serve
```

# Configuring Supervisor

```sh
#super[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /home/forge/uploadProducts/artisan queue:work sqs --queue=insertproduct --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
user=forge
numprocs=8
redirect_stderr=true
stdout_logfile=/home/forge/uploadProducts/worker.log
stopwaitsecs=3600
```

# swagger 

>http://localhost:8000/api/documentation


# Upload CSV

```sh
NOTE: category_id In the csv file, its value must be in the category table
```