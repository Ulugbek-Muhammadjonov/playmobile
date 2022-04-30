Playmobile
==========
Playmobile sms service

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ulugbek/playmobile "*"
```

or add

```
"ulugbek/playmobile": "*"
```

to the require section of your `composer.json` file.


Usage
-----

throw this into the components

```php
'sms' => [
            'class' => \ulugbek\playmobile\components\Sms::class,
        ],
```


throw this into the modules

```php
'playmobile' => [
            'class' => 'ulugbek\playmobile\Modul',
        ],
```

for migration

```php
php yii migrate/up --migrationPath=@vendor/ulugbek/playmobile/migrations
```