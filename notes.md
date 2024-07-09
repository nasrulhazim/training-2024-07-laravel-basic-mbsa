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
