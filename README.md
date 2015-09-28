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

#### Usage
```
$mc = new MailChimp('Your API KEY');
$results = $mc->get('lists/your_directory_list/members');

echo json_decode($results);
```

#### Bug report
This package is not perfect right, but can be improve together. If you found bug or have any suggestion.
Send that to me or new issue. Thank you to use it.
