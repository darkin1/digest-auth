Digest Authentication
===============

[![Latest Stable Version](http://img.shields.io/github/release/darkin1/digest-auth.svg)](https://packagist.org/packages/darkin1/digest-auth) 
[![Donate](https://img.shields.io/badge/donate-paypal-blue.svg)](https://www.paypal.me/dciesielski)
[![Tests](https://travis-ci.org/darkin1/digest-auth.svg?branch=master)](https://travis-ci.org/darkin1/digest-auth)


Digest Authentication RFC 2617 for Lumen 5.x

Installation
------------

Installation using composer:

```
composer require darkin1/digest-auth
```


And add the service provider in `config/app.php`:

```php
Darkin1\DigestAuth\DigestAuthServiceProvider::class,
```

Configuration
-------------

Change your default settings in `app/config/digest-auth.php`:

```php
<?php
return [
    'digest-realm' => env('DIGEST_REALM', '****'),
];
```


Documentation
-------------

[Digest Authentication RCF](https://tools.ietf.org/html/rfc2617#section-3.5)

[php.net example](http://php.net/manual/en/features.http-auth.php)