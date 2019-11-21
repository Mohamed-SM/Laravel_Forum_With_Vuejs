# Get Started
to start the project from the final phase use this commands

```bash
git clone git@github.com:Mohamed-SM/Laravel_Forum_With_Vuejs.git
composer install
cp .env.example .env
php artisan key:generate
```

and you need to create a database

```bash
mysql -u root -p
```
and enter your password
then
```mysql
create database laravel_forum;
exit
```

then edit the `.env` file with your own variables and then migrate and seed using

*.env*
```text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_forum
DB_USERNAME=root
DB_PASSWORD={YOUR PASSWORD HERE}
```
*Terminal*
```bash
php artisan migrate --seed
```

then as a final step setting up passport

```bash
php artisan passport:install
```

Add the following env vars to your `.env`

*.env*
```bash
PASSPORT_CLIENT_ID=2
PASSPORT_CLIENT_SECRET={the client's 2 key}
```

and finally 

```bash
php artisan serve
```

