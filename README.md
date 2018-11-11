Yii2 Favorites System
====================
Favorites System for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist thienhungho/yii2-favorites "*"
```

or add

```
"thienhungho/yii2-favorites": "*"
```

to the require section of your `composer.json` file.

### Migration

Run the following command in Terminal for database migration:

```
yii migrate/up --migrationPath=@vendor/thienhungho/Favorites/migrations
```

Or use the [namespaced migration](http://www.yiiframework.com/doc-2.0/guide-db-migrations.html#namespaced-migrations) (requires at least Yii 2.0.10):

```php
// Add namespace to console config:
'controllerMap' => [
    'migrate' => [
        'class' => 'yii\console\controllers\MigrateController',
        'migrationNamespaces' => [
            'thienhungho\Favorites\migrations\namespaced',
        ],
    ],
],
```

Then run:
```
yii migrate/up
```

Config
------------

Add module FavoriteManage to your `AppConfig` file.

```php
...
'modules'          => [
    ...
    /**
      * Favorite
      */
    'favorite' => [
        'class' => 'thienhungho\Favorites\modules\Favorites\FavoriteModule',
    ],
    ...
],
...
```

Modules
------------

[FavoriteBase](https://github.com/thienhungho/yii2-favorites/tree/master/src/modules/FavoriteBase), [Favorites](https://github.com/thienhungho/yii2-favorites/tree/master/src/modules/Favorites)

Functions
------------

[Core](https://github.com/thienhungho/yii2-favorites/tree/master/src/functions/core.php)

Models
------------

[Favorite](https://github.com/thienhungho/yii2-favorites/tree/master/src/models/Favorite.php)