# Roman Numerals API Task

## How install
 1. Git clone the repository
 2. composer install
 3. cp .env.example .env
 4. php artisan key:generate
 5. ./vendor/bin/sail up
 6. sail artisan migrate --seed (will seed 5 data to get started)

 ## Routes for testing with postman
 Add to header "Accept" : "application/json"
  1. GET :- http://localhost/api/v1/convert (Retrieves all)
  2. GET :- http://localhost/api/v1/convert/{id} (Show one)
  3. POST :- http://localhost/api/v1/convert (POST DATA)
        For posting data add in body raw json type eg: - 
        {
            "integer": 1
        }
  4. GET :- http://localhost/api/v1/recemt/ (Shows 5 recent data with descending date)
  5. GET :- http://localhost/api/v1/top/ (Shows 10 data with highest integer value)

  ## PHPUnit test service class
  - sail test

  # IF any question please donot hesitate to contact me