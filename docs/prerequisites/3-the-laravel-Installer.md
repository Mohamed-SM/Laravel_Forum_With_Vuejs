# 3 The Laravel Installer
The Next Step is to install Laravel installter, which is a binary that takes car of creating a laravel project for us
with a simple command as `laravel new forum`. 

## Using Composer to install Laravel

So to do that we use [Composer](/prerequisites/2-install-php-mysql-and-composer?id=installing-composer) by running this command

```bash
composer global require laravel/installer
```
*output*
```test

Changed current directory to /home/yaya/.config/composer
Using version ^2.3 for laravel/installer
./composer.json has been created
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 14 installs, 0 updates, 0 removals
  - Installing symfony/process (v4.4.0): Downloading (100%)         
  - Installing symfony/polyfill-ctype (v1.12.0): Downloading (100%)         
  - Installing symfony/filesystem (v4.4.0): Downloading (100%)         
  - Installing psr/container (1.0.0): Downloading (100%)         
  - Installing symfony/service-contracts (v2.0.0): Downloading (100%)         
  - Installing symfony/polyfill-php73 (v1.12.0): Downloading (100%)         
  - Installing symfony/polyfill-mbstring (v1.12.0): Downloading (100%)         
  - Installing symfony/console (v4.4.0): Downloading (100%)         
  - Installing ralouphie/getallheaders (3.0.3): Downloading (100%)         
  - Installing psr/http-message (1.0.1): Downloading (100%)         
  - Installing guzzlehttp/psr7 (1.6.1): Downloading (100%)         
  - Installing guzzlehttp/promises (v1.3.1): Downloading (100%)         
  - Installing guzzlehttp/guzzle (6.4.1): Downloading (100%)         
  - Installing laravel/installer (v2.3.0): Downloading (100%)         
symfony/service-contracts suggests installing symfony/service-implementation
symfony/console suggests installing symfony/event-dispatcher
symfony/console suggests installing symfony/lock
symfony/console suggests installing psr/log (For using the console logger)
guzzlehttp/psr7 suggests installing zendframework/zend-httphandlerrunner (Emit PSR-7 responses)
guzzlehttp/guzzle suggests installing psr/log (Required for using the Log middleware)
Writing lock file
Generating autoload files

```

and to make it valuable from everywhere like we did with Composer we must modify the PATH variable this time to do this
we need to edit the file `~/.bashrc ` buy this command

```bash
nano ~/.bashrc 
```
and add this line at the end of the file

```text
#...
export PATH=/home/$USER/.config/composer/vendor/bin:$PATH

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

