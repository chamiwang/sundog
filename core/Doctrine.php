<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/20
 * Time: 10:23
 */

namespace Core;
use Doctrine\ORM\Mapping\Driver\SimplifiedYamlDriver;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Doctrine
{
    private static $entityManager;
    public function __construct()
    {
    }

    public static function getEntityManager()
    {
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
        $driver = new SimplifiedYamlDriver($namespaces);
        $config->setMetadataDriverImpl($driver);
        if(! (self::$entityManager instanceof self) ) {
            self::$entityManager = EntityManager::create($dbParams, $config);
        }

        return self::$entityManager;
    }
}