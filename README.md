# pruebaAdminInfo

## Installation
***
A little intro about the installation. 

$ git clone https://github.com/LucasHernando/pruebaAdminInfo.git
$ cd pruebaAdminInfo/app/app-lucaas
$psql crate database db_prueba;
$ php artisan migrate
$ php artisan db:seed --class=DatabaseSeeder
$ php artisan serve


## Routes

*** Generate Token

http://localhost:8000/api/login

*** Params Json
{"email":"exampleUser@example.net", "password":"password"}

http://localhost:8000/api/products

*** Route to list products
*** Params Json
{"email":"exampleUser@example.net", "password":"password"}