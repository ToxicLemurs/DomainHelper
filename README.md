## A simple helper to aid with determining sub domain names, root domains and protocols

This helper will aid in determining sub domain names, root domains and protocols (http / https) with optional Laravel integration. 

## Installation:

Require this package in your composer.json and update composer. This will download the package and all the dependencies:

    "toxic-lemurs/domain-helper": "1.*"
    
Alternatively you can require this through composer via the command line:

    $ composer require toxic-lemurs/domain-helper

### Laravel 5.x:

Run a composer update and add the following Service Provider in your config/app.php

    ToxicLemurs\DomainHelper\DomainHelperServiceProvider::class,

You can make use of the Facade feature in Laravel:

    'DomainHelper' => ToxicLemurs\DomainHelper\Facades\DomainHelper::class,
    
## Getting started and usage:

You can use the Facade in Laravel to call various methods on this helper:

    DomainHelper::getDomainName();
    
Or you can instantiate an instance of the Domain Helper class:

    $domainHelper = new \ToxicLemurs\DomainHelper\DomainHelper();
    $domainHelper->getDomainName();
    
You can override the Server Name as returned by HTTP_HOST:

    $domainHelper = new \ToxicLemurs\DomainHelper\DomainHelper();
    $domainHelper->setServerName('foo.example.com');
    $domainHelper->getDomainName();
    
To get the sub domain name(s):

    $domainHelper = new \ToxicLemurs\DomainHelper\DomainHelper();
    $domainHelper->getSubDomainNames();
    
    OR
    
    DomainHelper::getSubDomainNames();

You can either get a string or an array result back for the sub domains:

    $domainHelper = new \ToxicLemurs\DomainHelper\DomainHelper();
    $domainHelper->setServerName('foo.bar.example.com');
    $domainHelper->getSubDomainNames(true);
            
    OR
    
    DomainHelper::getSubDomainNames(true);
    
    Will return:
         
        array:2 [
            0 => "foo"
            1 => "bar"
        ]
    
You can check if the domain you are currently on is the root domain:

    $domainHelper = new \ToxicLemurs\DomainHelper\DomainHelper();
    $domainHelper->isRoot();
    
    OR
    
    DomainHelper::isRoot();
    
You can get the current request protocol:

    $domainHelper = new \ToxicLemurs\DomainHelper\DomainHelper();
    $domainHelper->getProtocol();
    
    OR
    
    DomainHelper::getProtocol();

### License:

This Domain Helper is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)