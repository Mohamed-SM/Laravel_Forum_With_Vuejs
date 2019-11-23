# Pass Request Data to Your Views

## The request() helper function
sometimes we pass data in the URL (a GET data) like this http://127.0.0.1:8000/test?name=Mohamed, in Laravel we can 
fetch this data using the `request`  [helper function](https://web.cs.wpi.edu/~cs1101/a05/Docs/creating-helpers.html)
like this

```php
$name = request('name');
```

where we pass the key as a parameter the the request function, we can return the data like this:

*web.php*
```php
Route::get('/test', function () {
    $name = request('name');
    //return view('test');
    return $name;
});
```
we get the result like this

![](../_media/Screenshot%20from%202019-11-23%2000-20-50.png) 

you can try to change the value in the URL and refresh the page you are going to see the name returned every time

## sending the data to the view

if we do this 

*web.php*
```php
Route::get('/test', function () {
    $name = request('name');
    return view('test');
});
```

then in the test view file, we `echo` the variable

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
    <h1>Test View</h1>
    <p><strong>name: </strong><?php echo $name?></p>
</body>
</html>
```

we get and error **Undefined variable: name**

![](../_media/Screenshot%20from%202019-11-23%2000-29-19.png)  

so simply defining the variable doesn't work we have to pass it the vew, we do that like this

*web.php*
```php
Route::get('/test', function () {
    $name = request('name');
    return view('test',[
        'name' => $name
    ]);
});
```
![](../_media/Screenshot%20from%202019-11-23%2000-32-22.png) 

but this has a problem. let say that we user enters this URL `http://127.0.0.1:8000/test?name=<script>console.log('script executed')</script>`
the result is going to be like this

![](../_media/Screenshot%20from%202019-11-23%2000-34-55.png)

or like this if the URL was : `http://127.0.0.1:8000/test?name=<script>alert('problem')</script>`

![](../_media/Screenshot%20from%202019-11-23%2000-40-05.png) 

to avoid this in **PHP** in general we use htmlspecialchars() function to echo variables 

```blade
<p><strong>name: </strong><?php echo htmlspecialchars($name, ENT_QUOTES)?></p>
```

and as we can see that fixed the problem

![](../_media/Screenshot%20from%202019-11-23%2000-45-26.png)

## blade emplating engine

how ever in laravel it's easy to do that using **blade**, as I said last time a special kind of treatment goes in 
blade files, it's some kind of interpretation that happens, what i mean is blade is a templating engine, and it has
a some special syntax it's not like a programming syntax so there is not a lot to learn just few special words, and 
trust me you will appreciate it when you use it.

So back to our example let's change the view like this

```blade
...
<body>
    <h1>Test View</h1>
    <p><strong>name: </strong>{{ $name }}</p>
</body>
...
```

we get the same result 

![](../_media/Screenshot%20from%202019-11-23%2000-53-48.png)

so what's going on here?

wel to explain it in a simple why the blade file is been used to generate a normal php file if you go in the 
`storage/framework/views/` folder you will find some php files like this

```text
$ ls -lh  storage/framework/views/
total 16K
-rw-r--r-- 1 moh moh 1,8K nov.  22 23:13 254161f5d280dea94e0d5cb44976af762fabfad8.php
-rw-r--r-- 1 moh moh  512 nov.  23 00:53 2cb9a61d59e5c5506026fc8eaf167ddbdbc33cca.php
-rw-r--r-- 1 moh moh  450 nov.  22 23:13 e9f8e425298d085924ae13d36f10348e11e41fc9.php
-rw-r--r-- 1 moh moh 3,2K nov.  22 23:03 fcf2f1adc016d5a22d944621b29974e4c22a6f30.php
```

One of these files is generated from our **test.blade.php** file and it's like this

```php
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
    <h1>Test View</h1>
    <p><strong>name: </strong><?php echo e($name); ?></p>
</body>
</html>
<?php /**PATH /home/moh/Documents/Projects/agro_consultation/resources/views/test.blade.php ENDPATH**/ ?>
```

see the `{{ $name }}` is now `<?php echo e($name); ?>`, if you hold CTRL and click on the `e` function it will take 
you to where it's been defined.

> I'm using Phpstorm, if you are using too or vscode you can do that too, otherwise open the file `vendor/laravel/framework/src/Illuminate/Support/helpers.php`
in **line 245**

you will see this

*vendor/laravel/framework/src/Illuminate/Support/helpers.php line 245*
```php
...
if (! function_exists('e')) {
    /**
     * Encode HTML special characters in a string.
     *
     * @param  \Illuminate\Contracts\Support\Htmlable|string  $value
     * @param  bool  $doubleEncode
     * @return string
     */
    function e($value, $doubleEncode = true)
    {
        if ($value instanceof Htmlable) {
            return $value->toHtml();
        }

        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', $doubleEncode);
    }
}
...
```

notice the `e` function return return `htmlspecialchars` function with `$value` passed to it and `ENT_QUOTES`, this is 
what happens behind the scenes


### Recap
  - we learned that we can pass data and retrieve it using `request` helper function, with this function we can also
  retrieve form data as we are going to see later
  - next we learned that second parameter in the view function, is an array containing the data that we want to pass
  to the view
  - we learned also that to echo variables we can use `{{ $variable }}` syntax rather then manually echoing theme
> if you want to echo the variables as they are without rating theme using `htmlspecialchars` function, use
`{!! $var !!}` this can be helpful if you have for example html text in your database and you want to show it.
