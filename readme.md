## Add the Volunteer Auth Method

* open config/auth.php

* add this to the "guards" array
```php
'volunteer' => [
    'driver' => 'session',
    'provider' => 'volunteers'
],
```

* add this to the "providers" array
```php
'volunteers' => [
            'driver' => 'eloquent',
    'model' => \Modules\Volunteers\Models\Volunteer::class,
],
```

* add this to the "passwords" array
```php
'volunteers' => [
    'provider' => 'volunteers',
    'email' => 'Emails.Auth.Reminder',
    'table' => 'password_resets',
    'expire' => 60,
],
```