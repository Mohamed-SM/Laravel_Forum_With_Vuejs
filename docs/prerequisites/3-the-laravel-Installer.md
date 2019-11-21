# 3 The Laravel Installer
The Next Step is to install Laravel installter, which is a binary that takes car of creating a laravel project for us
with a simple command as `laravel new forum`. 

## Using Composer to install Laravel

So to do that we use [Composer](/prerequisites/2-install-php-mysql-and-composer?id=installing-composer) by running this command

```bash
composer global require laravel/installer
```
and to make it valuable from everywhere like we did with Composer we must modify the PATH variable this time to do this
we need to edit the file `~/.bashrc ` buy this command

```bash
nano ~/.bashrc 
```
and add this line at the end of the file

```text
#...
export PATH=/home/moh/.config/composer/vendor/bin:$PATH

```
and to apply changes run the command

```bash
source ~/.bashrc 
```

## creating the first laravel project
Now you everything is ready to start working on our first laravel project, as said before to create a new laravel
project all you have to do is run the command

```bash
laravel new forum
```
> replace the word forum with the project name if you want a different name

## Starting the development Server

now to lunch our website locally

 ```bash
cd forum
php artisan serve
```

that should give the following output
 ```bash
$ php artisan serve
Laravel development server started: http://127.0.0.1:8000
 ```
 
 now all you have to do is open the address `http://127.0.0.1:8000` in the browser and that is proudly your first
 Laravel website, it should look like this
 
 ![Laravel Screen shot](../_media/Screenshot%20from%202019-11-21%2002-00-49.png)

