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


<div>

<div id="disqus_thread"></div>
<script>
var disqus_config = function () {
    this.page.url = "https://mohamed-sm.github.io/Laravel_Forum_With_Vuejs/#/prerequisites/3-the-laravel-Installer";
    this.page.identifier = "prerequisites/3-the-laravel-Installer";
};
(function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://laravel-forum-with-vuejs.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
})();
</script>
<noscript>
Please enable JavaScript to view the
<a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
</noscript>
</div>
