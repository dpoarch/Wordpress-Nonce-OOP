<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use wpnonce\nonce;

$action = 'save_record';
echo nonce::wp_nonce_confirm($action);

