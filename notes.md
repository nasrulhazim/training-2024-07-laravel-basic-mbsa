# Notes

## Day 1

Create controllers:

```bash
# Create an invokable controller
php artisan make:controller WelcomeController --invokable

# Create an empty controller
php artisan make:controller LandingPageController
php artisan make:controller GreetingController

# Create a resourceful controller
php artisan make:controller UserController -r
```

Display available routes:

```bash
php artisan route:list
```

Seed dummy data from tinker:

```bash
php artisan tinker
> \App\Models\User::factory(50)->create();
```

Create new view:

```bash
php artisan make:view users.index
```

## Day 2

See about application settings:

```bash
php artisan about
```

Install Jetstream

```bash
composer require laravel/jetstream
```

Install Jetstream with Livewire Stack:

```bash
php artisan jetstream:install livewire
```

Run compile assets:

```bash
npm run dev
```

> run during development

For production

```bash
npm run build
```

Generate URL using route name:

```php
// first argument is the route name
// second argument is the id tied to the route
route('users.show', $user->id); // output: http://127.0.0.1:8000/users/1
```

### Day 3

Create Policy:

```bash
php artisan make:policy UserPolicy --model=User
```

### Day 4

Create model, migration, factory and seeder using `make:model` command:

```bash
php artisan make:model Category -mfs
php artisan make:model Post -mfs
php artisan make:model Comment -mfs
```

Seed specific class seeder:

```bash
php artisan db:seed --class=PostSeeder
```

Set local for faker in `.env`:

```plaintext
APP_FAKER_LOCALE=ms_MY
```
