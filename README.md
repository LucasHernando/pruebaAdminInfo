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

```bash
curl \
  -H "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX3BrIjoxLCJ0b2tlbl90eXBlIjoiYWNjZXNzIiwiY29sZF9zdHVmZiI6IuKYgyIsImV4cCI6MTIzNDU2LCJqdGkiOiJmZDJmOWQ1ZTFhN2M0MmU4OTQ5MzVlMzYyYmNhOGJjYSJ9.NHlztMGER7UADHZJlxNG0WSi22a2KaYSfd1S-AuT7lU" \
  http://localhost:8000/api/products

*** Route to list products
*** Params Json