# 2 Install PHP MySQL and Composer

in this section we will setup the work environment before we start working 
on our app, this includes the basic setup of php and it's extensions and
also installing MySql serve and The package manager Composer

## Installing PHP and it's extensions

because Laravel is a PHP framework installing PHP is the first thing we should do
> note: Laravel 6 needs PHP7.2 or higher
### In Linux (Ubuntu)

in ubuntu installing PHP is simple just run the following command
```bash
sudo apt update
sudo apt install php
```

but to work with Laravel we must install some PHP [extensions](https://www.php.net/manual/en/extensions.alphabetical.php) according to the official [Laravel documentation](https://laravel.com/docs/6.x/installation#server-requirements) 
the list of extension we need is :
 - BCMath PHP Extension
 - Ctype PHP Extension
 - JSON PHP Extension
 - Mbstring PHP Extension
 - OpenSSL PHP Extension
 - PDO PHP Extension
 - Tokenizer PHP Extension
 - XML PHP Extension

and for some reason, one more extension is needed but not mentioned in the documentation which is `Zip extension`

to install thees extensions the command would be in this form ` sudo apt install php-<extension name> ` to install all the extensions use this command

```bash
sudo apt install php-bcmath php-json php-mbstring php-tokenizer php-xml php-zip
``` 
> note: some extensions are already included in PHP installation that's why they are not in the installation command

## Installing MySql

Now because we need a database to store our data MySql is just perfect for all what we are going to do, that's why installing it is the next step to get things ready

First, we run these commands

```bash
sudo apt update
sudo apt install mysql-server
```

Next, we need to run this command to configure MySql

```bash
sudo mysql_secure_installation
```

you can press Y and then ENTER to accept the defaults for all the subsequent questions, the output should be like this:
```bash
sudo mysql_secure_installation
```

```output
$ sudo mysql_secure_installation

Securing the MySQL server deployment.

Enter password for user root: 

VALIDATE PASSWORD COMPONENT can be used to test passwords
and improve security. It checks the strength of password
and allows the users to set only those passwords which are
secure enough. Would you like to setup VALIDATE PASSWORD component?

Press y|Y for Yes, any other key for No: n
Using existing password for root.
Change the password for root ? ((Press y|Y for Yes, any other key for No) : n

 ... skipping.
By default, a MySQL installation has an anonymous user,
allowing anyone to log into MySQL without having to have
a user account created for them. This is intended only for
testing, and to make the installation go a bit smoother.
You should remove them before moving into a production
environment.

Remove anonymous users? (Press y|Y for Yes, any other key for No) : Y
Success.


Normally, root should only be allowed to connect from
'localhost'. This ensures that someone cannot guess at
the root password from the network.

Disallow root login remotely? (Press y|Y for Yes, any other key for No) : Y
Success.

By default, MySQL comes with a database named 'test' that
anyone can access. This is also intended only for testing,
and should be removed before moving into a production
environment.


Remove test database and access to it? (Press y|Y for Yes, any other key for No) : Y
 - Dropping test database...
Success.

 - Removing privileges on test database...
Success.

Reloading the privilege tables will ensure that all changes
made so far will take effect immediately.

Reload privilege tables now? (Press y|Y for Yes, any other key for No) : Y
Success.

All done! 
```

Now if you are running Ubuntu 18.04 or later you need to adjust The root authentication method to be able to access to the database,

To do that run the flowing command to access to mysql server
```bash
sudo mysql
```
Then these commands to change the authentication method
```mysql
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
FLUSH PRIVILEGES;
```
> make sur to change the password to a strong password

To verify that every thins is good

```mysql
mysql> SELECT user,plugin,host FROM mysql.user;
+------------------+-----------------------+-----------+
| user             | plugin                | host      |
+------------------+-----------------------+-----------+
| mysql.infoschema | caching_sha2_password | localhost |
| mysql.session    | caching_sha2_password | localhost |
| mysql.sys        | caching_sha2_password | localhost |
| root             | mysql_native_password | localhost |
+------------------+-----------------------+-----------+
4 rows in set (0.00 sec)

mysql> exit
Bye
 
```
> From now on you need this command to be able to access the database
```bash
mysql -u root -p
```

for more information on how to install mysql and set it up check this 
[tutorial](https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-18-04) from digitalocean.com

## Installing Composer
Finally,[Composer](https://getcomposer.org/).

let's talk about Composer and what it is: 

well now practically no one starts writing his website or software from scratch, what I mean by 
that is, to be productive in your work and do more in less time you must no do everything on 
your own, you use what's called libraries or packages, and it's no wonder that those packages 
also depends on other packages, that's just logical if you think about it, and that's where 
package managers come in place, they are the tool we use to manage all the packages we use and all 
their dependencies, like apt it's a package manager for Ubuntu, we have Composer as a package manager 
for PHP applications, we generally use it to add libraries and packages to our application to avoid 
spending too much time working on functionalities that someone else already have don and made 
publicly available for us, and we also use it to install Laravel and all its dependencies.

with that out of the way let's install Composer:

according to the [official documentation](https://getcomposer.org/download/) of Composer all you have to do is past this into the terminal

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

and one last step to make it available anywhere

```bash
sudo mv composer.phar /usr/local/bin/composer
```

and by this we done preparing for every thing next we will install Laravel
