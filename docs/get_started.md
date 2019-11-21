# Get Started
to start the project from the final phase use this commands

```bash
git clone git@github.com:Mohamed-SM/Laravel_Forum_With_Vuejs.git
composer install
cp .env.example .env
php artisan key:generate
```

then edit the `.env` file with your own variables and then migrate and seed using

```bash
php artisan migrate --seed
```

then as a final step setting up passport

```bash
php artisan passport:install
```

Add the following env vars to your `.env`

```bash
PASSPORT_CLIENT_ID=2
PASSPORT_CLIENT_SECRET={the client's 2 key}
```

and finally 

```bash
php artisan serve
```

