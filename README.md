# Wordpress Nonce OOP
A Composer package, which serves the functionality working with WordPress Nonces.
Implements wp_nonce_*() functions in an object orientated way.

## Instructions

You can install this class by pasting it into the root of your plugin directory.

1. Download the this repo.
2. Unzip the file.
3. Copy and paste it into the root of your plugin directory.

## Usage

Setup the minimum required thigs:

```php
<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use wpnonce\nonce;

// Instantiate an object of the class
$wpnonce = new nonce();
```

## How to use

Retrieve URL with nonce added:

```php
$url="/../wp-admin/post.php?post=177";
$complete_url = $wpnonce->get_wp_nonce_url( $url, 'edit-post_'.$post->ID );
```

Retrieves or displays the nonce hidden form field:

```php
$wpnonce->get_wp_nonce_field( 'delete-post_'.$post_id );
```

Generate and returns a nonce:

```php
$newnonce = $wpnonce->create_nonce( 'action_'.$post->id );
```

Verify nonce:

```php
$wpnonce->wp_verify_nonce_field( 'delete-post_'.$post_id );
```

Verify nonce in AJAX request:

```php
$wpnonce->wp_check_ajax_referer( 'post-comment' );
```

Test if the current request carries a valid nonce:

```php
$wpnonce->wp_check_admin_referer( $_REQUEST['my_nonce'], 'edit-post_'.$post->ID );
```

## Unit Testing

We are using phpUnit to run unit tests.
You may use [Composer](https://getcomposer.org/) to download and install PHPUnit as well as its dependencies. Please refer to the [documentation](https://phpunit.de/documentation.html) for details on how to do this.

```php
$ phpunit tests/UnitTest.php
```
