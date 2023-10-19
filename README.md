# ManagamentPanel

## Run local env with Docker
- Download, install and configure Docker in your system.
- Clone project from repository.
- Copy .env.example to .env and adjust values.
- Run command: `composer install` in directory with project.
- Run command: `php artisan key:generate` in directory with project.
- Run command: `docker compose up -d` in directory with project.
- Run command: `php artisan migrate` in directory with project.
- Run command: `php artisan db:seed --class=DefaultSeeder` in directory with project.
- Run command: `php artisan serve` in directory with project.

## Address in the browser (default ports): 
- http://127.0.0.1:8000/employees - project
- http://127.0.0.1:8080 - phpmyadmin