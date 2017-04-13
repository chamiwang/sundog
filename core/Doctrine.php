<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/20
 * Time: 10:23
 */

namespace Core;
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
        $config = include_once(APP_ROOT.'/app/config/config.php');
        $dbParams = $config['database'];

        // Create a simple "default" Doctrine ORM configuration for Annotations
        $isDevMode = $config['dev_mode'];

        $paths = array(APP_ROOT."/app/models/yaml");
        $config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
        if(! (self::$entityManager instanceof self) ) {
            self::$entityManager = EntityManager::create($dbParams, $config);
        }
        return self::$entityManager;
    }
}