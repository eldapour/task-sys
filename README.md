# Tasks Management System
***
## Installation

### requirements :
* php >= 8.0

```
composer install
```
### command

* migration 
```
php artisan migrate:fresh --seed
```
* start server
```
php artisan serve
```
login user
```
http://127.0.0.1:8000/user/login
```
login admin
```
http://127.0.0.1:8000/admin/login
```
* seed tasks by queue
```
php artisan queue:work --queue=task_seeder
```
* run all schedule
```
php artisan schedule:work
```
* when read all notify for admin
```
php artisan queue:work --queue=read_notify
```

***

**Any Question Contact Me :**

**Phone : 201122717960 📱**

**Mail : eldapour@icloud.com ✉**   

