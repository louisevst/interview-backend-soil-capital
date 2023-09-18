# Welcome

Bellow you'll find the instructions you must complete to successfully pass the test.

May the force be with you.

# How to

-   Fork the repository and make your changes in your own private fork
-   Invite c.noterdaem@soilcapital.com to the fork

## What needs to be done

-   Be a hacker: find a way to successfully run the app and get the right JSON output from the API endpoint /v1/auth/ - hint: no code change needed (but think of Composer + check Laravel doc https://laravel.com/docs/9.x).

I think that in composer.json, you don't need to include the classes in autoload. Because I don't see the directory in the project and based on the doc, the 'psr-4' allows autoloading classes in the app directory.
In order to run the app, I also need to create a PostgreSQL db (if you don't change the original db settings) on pgAdmin and add environement variable in .env.

then open a terminal and go inside the project diretory

`composer install` to install dependencies from the composer.json

`php artisan key:generate` to generate an APP_KEY

`php artisan migrate` To execute db migration and create the tables

`php artisan db:seed` To seed db with the fake data

`php artisan serve` This cmd launch the app

-   Be a saviour: fix a bug in the app. /v1/auth/debug?lang=fr should return a JSON with a `language` key containing the string "Français".

before: if ($params["language"] === "fr")
after:  if ($params["lang"] === "fr")

Whitout testing the endpoint I cannot say for sure that it's the issue but the param is passed as lang and not language so it never goes in the 'fr' condition and always return the language key with English.

-   Be a builder: add a new API endpoint to the app and fetch some external API data as JSON. Example, from: https://official-joke-api.appspot.com/random_joke.

I added a JokeController in app/Http/Controllers/v1 that fetch from the API, if the get request is succesfull, the data is returned as a json. If not, an error key containing the error string is returned.

I created a route to access the endpoint in routes/api/v1/joke.php
