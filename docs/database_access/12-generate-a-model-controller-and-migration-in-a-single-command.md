# Generate a Model Controller and Migration In A Single Command

since gereating a model and controller and migration every time can be a lot, because in real projects we will be doing 
it a lot there is a option to generate them all in on command

let's take a loot at the help for `make:model`

```bash
php artisan make:model -h
```

*output*
```text
Description:
  Create a new Eloquent model class

Usage:
  make:model [options] [--] <name>

Arguments:
  name                  The name of the class

Options:
  -a, --all             Generate a migration, factory, and resource controller for the model
  -c, --controller      Create a new controller for the model
  -f, --factory         Create a new factory for the model
      --force           Create the class even if the model already exists
  -m, --migration       Create a new migration file for the model
  -p, --pivot           Indicates if the generated model should be a custom intermediate table model
  -r, --resource        Indicates if the generated controller should be a resource controller
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
      --env[=ENV]       The environment the command should run under
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```

there is an opion `-a` or `--all` to Generate a migration, factory, and resource controller for the model, we will talk 
about a factory later, so this option will help us generate all the files we want in one command, we can alse
do it indeviduly using `-c` option to gerenate only a contoller and `-m` option to only gereate a migration
or we can use `-cm` to gerate both the migration and the controller

so if we run the command

```bash
 php artisan make:model Project -cm
```

we gereate the three files at once

*output*
```text
Model created successfully.
Created Migration: 2019_11_29_160059_create_projects_table
Controller created successfully.
```

and that's what we will be using from now on

> delete the gerated files because we don't need theme

### RECAP
- we can now generate the model and the controller and the migration in one command

