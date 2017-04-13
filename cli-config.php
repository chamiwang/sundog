<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "bootstrap.php";

// the connection configuration
$config = include_once(APP_ROOT.'/app/config/config.php');
$dbParams = $config['database'];

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = $config['dev_mode'];

$paths = array(APP_ROOT."/app/models/yaml");
$config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);