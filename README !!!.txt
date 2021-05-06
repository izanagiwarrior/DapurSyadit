1. composer install
2. npm install
3. cp .env.example .env
4. make database "DapurSyadit" on local
5. change "laravel" to "DapurSyadit" on .env (DB_DATABASE)
6. php artisan key:generate
7. php artisan migrate
8. php artisan db:seed --class=CreateUsersSeeder
9. php artisan db:seed --class=ProductsSeeder   
10. php artisan serve  

Notes : make sure XAMPP -> Apache & MySQL Active before step 4.