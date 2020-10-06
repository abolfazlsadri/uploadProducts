# Upload products

> [PHP](https://php.net) API for an Upload products service with mysql.

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
$ php artisan queue:work --queue=insertproduct
```

# swagger 

>http://localhost:8000/api/documentation
