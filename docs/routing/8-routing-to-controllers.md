# Routing to Controllers

ok we have seen routes and views, the next step in our journey is going to be the Controllers.

## The controller
in Laravel the callback function in the route is nice that we can define it in the router file, but that's not how we 
do it, because for large projects that it's not a good idea to do that, instead we use Controllers.

So the controller is a class that has methods, we use the methods in that class as the callback function in the route.
to create a Controller. we can do it in 2 ways

## manually creating the controller

we can add class called in our example PostController in the `app/Http/Controllers/` directory

![](../_media/wildcards/Screenshot%20from%202019-11-23%2020-13-42.png)


*PostController.php*
```php
<?php


namespace App\Http\Controllers;


class PostController
{

}

```
 
and in side of it we add a function called show, to show the post, and we put in the, the code
from the callback function in our web.php route file, the method show accept `$post` variable too

 
*PostController.php*
```php
<?php


namespace App\Http\Controllers;


class PostController
{
    public function show($post){
        $posts = [
            'post1' => 'This is the post number one',
            'post2' => 'This is the post number Two',
            'post3' => 'This is the post number Three',
        ];

        if(! array_key_exists($post,$posts)) {
            abort(404, 'that post was not found');
        }

        return view('test',[
            'name' => $posts[$post]
        ]);
    }

}

```

then we change our route to 

*web.php*
```php
Route::get('/posts/{post}', 'PostController@show');

```
now in the browser if we refresh, we will have the same results as in last section

![](../_media/wildcards/Screenshot%20from%202019-11-23%2020-20-01.png) 

## Using Artisan

now delete the controller file and let me show you how it's done in Laravel.
if you ls your project source folder you will see and file called artisan

```bash
$ ls
app  artisan  bootstrap  composer.json  composer.lock  config  database  docs  graphql
_ide_helper.php  package.json  package-lock.json  phpunit.xml  public  resources  routes  
server.php  storage  tests  vendor  webpack.mix.js

```

it's the same file we use to run our development server when we type

```bash
php artisan serve
```

in a new terminal windows, type just

```bash
php artisan
```

you will see a lot of output, that output is the possible artisan commands we can use, so don't worry you don't have to
remember all of theme but you will learn each one of theme and what it does alone the way. 

ok now scroll until you find the make section

```text
 make
  make:channel                        Create a new channel class
  make:command                        Create a new Artisan command
  make:controller                     Create a new controller class
  make:event                          Create a new event class
  make:exception                      Create a new custom exception class
  make:factory                        Create a new model factory
  make:job                            Create a new job class
  make:listener                       Create a new event listener class
  make:mail                           Create a new email class
  make:middleware                     Create a new middleware class
  make:migration                      Create a new migration file
  make:model                          Create a new Eloquent model class
  make:notification                   Create a new notification class
  make:observer                       Create a new observer class
  make:policy                         Create a new policy class
  make:provider                       Create a new service provider class

```

this is what we are interested in. see the 3rd like it's says `make:controller Create a new controller class`, that's
we will use to create our Controller, so now type

```bash
$ php artisan make:controller PostController
Controller created successfully.
```

now we have a controller generated using artisan

*PostController.php*
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
}

```

then we will just put in our show function like we did before

*PostController.php*
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($post){
        $posts = [
            'post1' => 'This is the post number one',
            'post2' => 'This is the post number Two',
            'post3' => 'This is the post number Three',
        ];

        if(! array_key_exists($post,$posts)) {
            abort(404, 'that post was not found');
        }

        return view('test',[
            'name' => $posts[$post]
        ]);
    }
}

```

and that's how we create controllers in Laravel

### recap
- we learned how to create controllers
- we have seen how to used them in the route file
- we also learned how to generate them using artisan
