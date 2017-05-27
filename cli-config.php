<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "bootstrap.php";

// the connection configuration
$config = include(APP_ROOT.'/app/config/config.php');
$dbParams = $config['database'];

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = $config['dev_mode'];

$paths = array(APP_ROOT."/app/models/yml");
$config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
$namespaces = array(
    APP_ROOT.'/app/models/yml' => 'App\Model',
);
$driver = new \Doctrine\ORM\Mapping\Driver\SimplifiedYamlDriver($namespaces);
$config->setMetadataDriverImpl($driver);

$entityManager = EntityManager::create($dbParams, $config);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);