## A simple helper to aid with determining sub domain names, root domains and protocols

This helper will aid in determining sub domain names, root domains and protocols (http / https). 

## Installation:

Require this package in your composer.json and update composer. This will download the package and all the dependencies:

    "toxic-lemurs/domain-helper": "1.*"
    
Alternatively you can require this through composer via the command line:

    $ composer require toxic-lemurs/domain-helper

### Laravel 5.x:

Run a composer update and add the following Service Provider in your config/app.php

    ToxicLemurs\MenuBuilder\MenuBuilderServiceProvider::class,

Optionally you can make use of the Facade:

    'MenuBuilder' => ToxicLemurs\MenuBuilder\Facades\MenuBuilder::class,
    
## Getting started:

### License:

This Menu Builder for Laravel is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)