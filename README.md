<p align="center">
<img src="https://images.ctfassets.net/3g7s03pwyjhz/2IzXOYWCE0GGMMMcGaQGUa/417075681409c9f43a359a999498c71b/bigcartel_headerx2.png?w=998&fm=webp" alt="JWT">
</p>

# Laravel MailChimp
[![Total Downloads](https://poser.pugx.org/ALTELMA/laravel-mailchimp/d/total.svg)](https://packagist.org/packages/altelma/laravel-mailchimp)

A packages provides you to connect mailchimp API v3

### Setup
- Run `$ composer require altelma/laravel-mailchimp`

- **(Only for Laravel 5.5 or minor)** Add provider to config/app.php

```
providers => [
        Altelma\LaravelMailChimp\MailChimpServiceProvider::class  
],
```
Make sure you never use "MailChimp" or exists this in your project.
After you finish config all run artisan to create config

```
php artisan vendor:publish
```

For optional if you want to use Alias class you can add this to config/app.php
```
aliases => [
      'MailChimp' => ALtelma\LaravelMailChimp\MailChimpFacade::class
]

```
#### Lumen

- Add provider to `bootstrap/app.php`

```
$app->register(Altelma\LaravelMailChimp\MailChimpServiceProvider::class);

```
- Copy `vendor/altelma/laravel-mailchimp/config/mailchimp.php` to `config/mailchimp.php`

- Add config to `bootstrap/app.php`

```php
$app->configure('mailchimp');
```
- Allow call package via Facade, uncomment

```php
$app->withFacades();

if (!class_exists('MailChimp')) {
    class_alias('Altelma\LaravelMailChimp\LaravelMailChimp', 'MailChimp');
}
```

## Usage
```
$mc = new MailChimp('Your API KEY');
$results = $mc->get('lists/your_directory_list/members');
echo json_decode($results);

// or
return reponse()-json($results);

// With Alias
$results = MailChimp::get('lists/your_directory_list/members');
echo json_decode($results);

// or
return reponse()-json($results);

```


## Bug report
This package is not perfect right, but it can improve together. If you've found bug or have any suggestions.
Send that to me or create a new issue. Thank you to use it.
