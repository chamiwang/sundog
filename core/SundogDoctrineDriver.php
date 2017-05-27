<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/28
 * Time: 14:15
 */

namespace Core;


use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping\Driver\YamlDriver;

class SundogDoctrineDriver extends YamlDriver
{

    public function __construct($locator, $fileExtension = '')
    {
        parent::__construct($locator, $fileExtension);
    }

    public function loadMetadataForClass($className, ClassMetadata $metadata)
    {
        $name = explode('\\', $className);
        parent::loadMetadataForClass($name[count($name)-1], $metadata);
    }
}