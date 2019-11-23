# Routing Wildcards
## what are Wildcards:
Sometimes when we use routing we need to use what's call a wildcard routes, a wildcard url is a url with a segment of it
that is changeable like for example `/posts/first-post` and `/posts/second-post`, the second half of the url is changeable
it's can a slug as in the example or an id or else...
## Using wildcards
to create it we use this syntax `/posts/{post}` in the first parameter of ht get function, and in the function that's in 
the second parameter we pass the wildcard as a parameter:

```php
Route::get('/posts/{post}', function ($post) {
    return view('test',[
        'post' => $post
    ]);
});
```

then if we visit the http://127.0.0.1:8000/posts/post1 URL
we see 

[](../_media/wildcards/Screenshot%20from%202019-11-23%2016-48-38.png)

no you can change the last part of the URL and see the deference

we still didn't cover databases yet so let's just create a simple array of objects and use it instead, in the route 
function before returning the view add this

```php
$posts = [
        'post1' => 'This is the post number one',
        'post2' => 'This is the post number Two',
        'post3' => 'This is the post number Three',
    ];
```

and then pass to the view the just one of the values in the array, and to select it use the wildcard from the route

```php
return view('test',[
        'name' => $posts[$post]
    ]);
```

so the web.php file will look like theis

```php
//...

Route::get('/posts/{post}', function ($post) {

    $posts = [
        'post1' => 'This is the post number one',
        'post2' => 'This is the post number Two',
        'post3' => 'This is the post number Three',
    ];

    return view('test',[
        'name' => $posts[$post]
    ]);
});

```

and in the browser enter the URL http://127.0.0.1:8000/posts/post1 or http://127.0.0.1:8000/posts/post1
and see what's is shown 

[](../_media/wildcards/Screenshot%20from%202019-11-23%2019-44-54.png)

now let's tray a one the doesn't exist, in the browser open the URL http://127.0.0.1:8000/posts/post4
we get an error **Undefined index: post4** that's because post4 doesn't exist in our array of posts;

![](../_media/wildcards/Screenshot%20from%202019-11-23%2019-48-17.png) 

to handel this we check for the key if it exist in the array before we return the view, if it doesn't we return a 404
message like this

*web.php*
```php
//...
Route::get('/posts/{post}', function ($post) {

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
});

```

now we get this page instead of the error page, it's an more user friendly error page

![](../_media/wildcards/Screenshot%20from%202019-11-23%2019-53-09.png)

and for the others it still works fine

![](../_media/wildcards/Screenshot%20from%202019-11-23%2019-54-49.png)  

### RECAP
- we add a wildcard to our route
- the wildcard is accepted as a parameter in our callback function
- next to simulate a database we used an array ([associative arrays](https://www.php.net/manual/en/language.types.array.php)).
- if the wild card doesn't exist in the array we return a 404 error page 
- if it was found we pass the value associated with the wildcard to the view
- finally we echo it out.
