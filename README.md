# laravel-mailchimp

#### Installation
,,,
require composer altelma/laravel-mailchimp --prefer-dist dev-master
,,,

#### Usage
,,,
$mc = new MailChimp('Your API KEY');
$results = $mc->get('lists/your_directory_list/members');

echo json_decode($results);
,,,
