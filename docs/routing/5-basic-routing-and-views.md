# Basic Routing and Views
In the Laravel is not mission impossible video we have seen that Laravel associate every URL to a webpage or a data of some sort, and we said that the URL is a route now let's see how this works and where exactly this is happening.
let's start the development server using
```bash
php artisan serve
```
*output*
```text
Laravel development server started: http://127.0.0.1:8000
```

now when we go to the URL http://127.0.0.1:8000 in the browser we see this

![](../_media/Screenshot%20from%202019-11-22%2022-11-52.png)

let's see how this works

## Routes

in the routes folder there are few files, one of theme is `web.php`, where we open this file
we see:

*routes/web.php*
```php
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

```
In this file we register all the routes in our application and as you can see the first route we find is `/` which is the 
root of our website. So the `Route` class method `get` takes two parameters the route (or the URL) and a function to be executed when
we visit that URL in this case the function is 
```php
function () {
    return view('welcome');
}
```
the function here returns a **view** called `welcome`.

So a **route** is a function that tokes 2 parameters a URL and a function to be executed when the URL is visited, and 
there are types of routes or as known by methods:
- GET
- POST
- DELETE
- PUT
and more ... 
> the HTTP protocol only support GET and POST but we can use the other methods using and extra post attribute named
`_method` and has the value of the method that we want to use

## Views
the view is the html portion of the website, it's what the user sees in the browser. In Laravel the views are located
in the `resources/views/` directory and when we return a view we just type it's name and buy default laravel will find
it in this directory. so in our early route the view that's been return is `welcome`  we can find it in 
`resources/views/` directory and it's name is `welcome.blade.php`. 

> notice the blade word in the name, it's a special type
of files called blade file, a blade file is a php file that goes in s special kind of treatment, we will get back to this
later

when you open the `welcome.blade.php` file you will find a lot of HTML code, it's the exact code that you see in the 
browser when you visit address `http://127.0.0.1:8000/` so if we change the word **Laravel** to **UTC** like this

```blade
....
<div class="content">
    <div class="title m-b-md">
        UTC
    </div>

    <div class="links">
...
```
and after we refresh the page we will see this

![](../_media/Screenshot%20from%202019-11-22%2023-04-44.png) 

## Creating a new route

back to the `web.php` file let's create a new route. add this at the end of the file

```php
Route::get('/welcome', function () {
    return view('welcome');
});
```

and then visit the url http://127.0.0.1:8000/welcome you will see the same result, that's because the route we added
return the same view

![](../_media/Screenshot%20from%202019-11-22%2023-10-48.png) 

if you got to any other route like http://127.0.0.1:8000/non_existing_route we will get a 404 not found error page

![](../_media/Screenshot%20from%202019-11-22%2023-13-22.png) 

## Routes returns

back to the `web.php` file let's return a **String** instead of a view

```php
Route::get('/welcome', function () {
    return 'Laravel';
});
```

we will get a String returned

![](../_media/Screenshot%20from%202019-11-22%2023-17-21.png) 

we can also return **JSON** so if for example we return an array

```php
Route::get('/welcome', function () {
    return ['hello' => 'world'];
});
```

we get 

![](../_media/Screenshot%20from%202019-11-22%2023-22-05.png) 

laravel has automatically converted it to JSON, so if we look at the headers we see `Content-Type	application/json` has
been returned this is really useful wen we start building the **APIs** later

## Adding a view
new let's add a `resources/views/` in there views folder, let's call it test.blade.php,and let's return it in a 
new route called test
so in the `web.php` file add

*web.php*
```php
Route::get('/test', function () {
    return view('test');
});
```

and let's visit the `http://127.0.0.1:8000/test` URL before we add the view, we will get this error:

![](../_media/Screenshot%20from%202019-11-22%2023-30-46.png) 

> it's a laravel error page *we are going to be seen this a lot it's just part of programming in general* and part of
learning is knowing how to read these errors and know how to fix theme

notice the error says `InvalidArgumentException View [test] not found.`, it's clear from the error that the view test
does't exist also below the error we have in the green box a more human friendly response it's says :**test was not found.
Are you sure the view exists and is a .blade.php file?**.
> sometimes we get a solution in this green box

you can keep on reading the rest of the information in this error page, it's important to know more about the error, it's 
just the best why to know how to fix the errors when they happen. when you are don, continue buy creating the test.blade.php
file in the views folder and then put some HTML in it

*test.blade.php*

```blade
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test View</title>
</head>
<body>
    Test View
</body>
</html>
```

and when you refresh the page in the browser you will see

[](../_media/Screenshot%20from%202019-11-22%2023-45-32.png)

### Recap
the routes are registered in the **web.php** inside the **routes** folder file and the views are located in the 
**resources/views/** folder and the end with **.blade.php** and they contain the HTML code portion of the website

