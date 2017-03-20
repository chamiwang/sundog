<?php
// bootstrap.php

require_once "vendor/autoload.php";

require_once 'vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
define("APP_ROOT",dirname(__FILE__));