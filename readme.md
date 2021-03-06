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
