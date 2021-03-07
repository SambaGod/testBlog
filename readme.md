**Installation (Mac):**

- brew install composer
- composer global require laravel/installer
- nano ~/.bash_profile // command line
- export PATH=~/.composer/vendor/bin:$PATH // paste inside
- source ~/.bash_profile // command line
- laravel new social
- php artisan serve
- npm install
- npm run dev
- install configure tailwind for laravel (-> tailwind documenation)
- tailwind stuff inside resources/css/app.css
- run npm run dev (or watch) again

**Introduction**

- Laravel comes with it's own templating engine called "Blade".
- Layout file extensions should be _file_name.blade.php_
- Blade syntax typically uses @ signs
- For this project we are using Tailwind

**Dependencies**

- larvel-mix (npm run dev) -> pull tailwind
- webpack.mix.js -> takes care of css and js

**Database**

- Laravel will by default migrate three pre-defined tables
- We are using postgres for this project
- configure .env and run php artisan migrate
- To add a new column to existing database -> php artisan make:migration add_username_to_users. It will automatically generate a file
- php artisan migrate:rollback -> rollback changes made to db
- now() function will insert current date and time

**Models/Controllers**

- Writing writes individually could be quite hactic, therefore, controllers are used instead
- php artisan make:controller _NameController_ OR if in a new directory, Directory\\_NameController_
- @csrf -> cross-site request forgery is used to provide a fake token that makes it possible to submit forms in dev environment
- Validation rules ($this->validate()) are available in Laravel documentation. Rules can be string based or an array.
- In repeat password, name must be name_confirmation so laravel can confirm for match later on.
- @error | @enderror -> error handling -> available in documentation
- For in-line error handling, twig syntax is not required
- old() is used to output something on the page
- Create models, migrations (-m) and factories (-f) together -> php artisan make:model Name -m -f

**User Authentication**

- auth()->user() or auth()->check() are the same
- Insteadf of @if @else @endif, @auth @endauth @guest @endguest could be used
- with() will flash a message to the session
- Using route('logout') directly is a security risk, therefore we use form instead.
- Simply passing $request->remember argument will remember the user token.

**Middleware**

- Middlewares can be added to the route file directly, or within the controller
