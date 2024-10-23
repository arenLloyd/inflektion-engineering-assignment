# inflektion-engineering-assignment
## _Setup Guide_
After cloning, please follow these:

## Database setup

On the project folder, update ```.env``` file.

```sh
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
After the Database connection setup, verify if can connect successfully.
```sh
php artisan migrate
```

## Hourly email extraction setup
1. Open the crontab file by running the following command in your terminal:
```sh
crontab -e
```
2. Add the following line to your crontab file:
```sh
* * * * * php /raw-email-extractor/artisan schedule:run >> /dev/null 2>&1
```
After the Cron job setup, verify if it works successfully.
```sh
php artisan emails:extract-email
```