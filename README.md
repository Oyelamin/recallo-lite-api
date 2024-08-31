## Language & Dependencies
  > - PHP ^8.3
  > - Laravel  10.*
  > - MYSQL
  > - Laravel JWT Auth


## Postman Documentation
  You can find the documentation to postman [HERE](https://documenter.getpostman.com/view/7943921/2sAXjM2qfv)


## Installation && Setup
Here's a guide on how you can setup the application:
  >  - Clone repo
  >  - Run: `composer install`
  >  - Run: `cp .env.example .env`
  >  - Run: `php artisan key:generate`
  >  - Run: `php artisan jwt:secret`
  >  - Update database credentials in the .env file
  >  - Run: `php artisan migrate --seed` to run migrations and seed dummy data in table


## Running Application
  > php artisan serve
  
