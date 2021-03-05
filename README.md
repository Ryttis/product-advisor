# PRODUCT-ADVISOR 
## Service, which returns product recommendations depending on the weather forecast
### Used technologies:

*** Laravel, Php 7.3, Mysql, Guzzle, fzaninotto/faker, sail.

### Instructions for application running using docker-compose.yml:

* clone repository

* ./vendor/bin/sail up -d

* ./vendor/bin/sail artisan migrate

* ./vendor/bin/sail artisan db:seed

* On Your browser adress bar run application on localhost. 

* insert url into Adress bar: 

example -> localhost:8000/api/products/recommended/ selected place name