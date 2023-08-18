## How to run this project

Install PHP, Node.js and Composer. After, install vite

```
npm install --save-dev vite laravel-vite-plugin
npm install --save-dev @vitejs/plugin-vue
```

Now, install the project dependencies

```
composer install
npm install
```

Rename .env.example as .env and edit the database lines as follow

```
DB_CONNECTION=sqlite
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Then run

```
php artisan key:generate
php artisan migrate
```

> Note. Laravel may ask you to create a sqlite file for creating the database. Type "yes" for doing so

Start the project

```
php artisan serve
npm run dev
```

## Authentication

Once the project is running, you need to register an account for accessing the dashboard. In order to do that, go to

```
localhost:8000
```

Click in Register, fill the fields and log in