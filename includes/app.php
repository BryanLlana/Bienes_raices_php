<?php 
require __DIR__ . '/helpers/index.php';
require __DIR__ . '/config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use App\Property;

$database = connectDatabase();
Property::setDB($database);