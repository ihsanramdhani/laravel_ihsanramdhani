## How to run

1. Connect to the database on .env file
2. Run migration
``` 
php artisan migrate 
```
3. Run seeder
```
php artisan db:seed --class=HospitalSeeder
php artisan db:seed --class=PatientSeeder
```
4. Run the program
```
php artisan serve
```