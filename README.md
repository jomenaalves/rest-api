# REST API with Lumen PHP Framework based in poke api

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

### Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

### Run this project
- make download of this project and run the list of comands line in paste of project 
- configure your database in .env arquive (default localhost)

### List of comands line 
- php artisan migrate
- php -S localhost:8000 -t public

### More details 
- database name: 'pokes' 
- you can test this project in [postman](https://www.postman.com/downloads/) or run the automatics test by comand line ( vendor/bin/phpunit )

### Routes 
- Get pokemon from poke.api (POST: http://localhost:8000/api/getPokes)
- List all pokemons in database (GET: http://localhost:8000/api/getPokes)
- Delete a pokemon by id (DELETE: http://localhost:8000/api/deletePoke/{POKEMON_ID_HERE})
- Create a specific poke (POST: /api/addSpecificPoke) With body payload (name, url)