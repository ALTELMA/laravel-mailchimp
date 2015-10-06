# laravel-mailchimp

#### Installation
```
require composer altelma/laravel-mailchimp --prefer-dist dev-master
```
or update your composer.json in root
```
{
  "require": {
    "altelma/laravel-mailchimp": "dev-master"
  }
}
```

After installation finish. add this to your config/app.php

```
providers => [
        LaravelMailChimp\MailChimpServiceProvider::class  
],
```

For optional if you want to use Alias class you can add this to config/app.php
```
aliases => [
      'MailChimp' => LaravelMailChimp\MailChimpFacde::class
]
```

Make sure you never use "MailChimp" or exists this in your project.
After you finish config all run artisan to create config
```
php artisan vendor::publish
```

#### Usage
```
$mc = new MailChimp('Your API KEY');
$results = $mc->get('lists/your_directory_list/members');

echo json_decode($results);
```

#### Bug report
This package is not perfect right, but can be improve together. If you found bug or have any suggestion.
Send that to me or new issue. Thank you to use it.
