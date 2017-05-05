# Zend Framework Module for jumbo-client

[![Build Status](https://travis-ci.org/detailnet/jumbo-client-module.svg?branch=master)](https://travis-ci.org/detailnet/jumbo-client-module)
[![Coverage Status](https://img.shields.io/coveralls/detailnet/jumbo-client-module.svg)](https://coveralls.io/r/detailnet/jumbo-client-module)
[![Latest Stable Version](https://poser.pugx.org/detailnet/jumbo-client-module/v/stable.svg)](https://packagist.org/packages/detailnet/jumbo-client-module)
[![Latest Unstable Version](https://poser.pugx.org/detailnet/jumbo-client-module/v/unstable.svg)](https://packagist.org/packages/detailnet/jumbo-client-module)

## Introduction
This module integrates [jumbo-client](https://github.com/detailnet/jumbo-client) with [Zend Framework](https://github.com/zendframework/zendframework).

## Requirements
[Zend Framework Skeleton Application](http://www.github.com/zendframework/ZendSkeletonApplication) (or compatible architecture)

## Installation
Install the module through [Composer](http://getcomposer.org/) using the following steps:

  1. `cd my/project/directory`
  
  2. Create a `composer.json` file with following contents (or update your existing file accordingly):

     ```json
     {
         "require": {
             "detailnet/jumbo-client-module": "1.x-dev"
         }
     }
     ```
  3. Install Composer via `curl -s http://getcomposer.org/installer | php` (on Windows, download
     the [installer](http://getcomposer.org/installer) and execute it with PHP)
     
  4. Run `php composer.phar self-update`
     
  5. Run `php composer.phar install`
  
  6. Open `configs/application.config.php` and add following key to your `modules`:

     ```php
     'Jumbo\Client',
     ```

  7. Copy `vendor/detailnet/jumbo-client-module/config/jumbo_client.local.php.dist` into your application's
     `config/autoload` directory, rename it to `jumbo_client.local.php` and make the appropriate changes.

## Usage
tbd
