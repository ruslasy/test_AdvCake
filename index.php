<?php
    
$loader = require 'vendor/autoload.php';

$loader->addPsr4('App\\', 'App');

$app = new App\App();