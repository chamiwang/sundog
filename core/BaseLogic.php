<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/17
 * Time: 17:03
 */
namespace Core;

class BaseLogic
{
    public function __construct()
    {
        $this->em = Doctrine::getEntityManager();
    }

    protected function getModelName()
    {
        return '';
    }

    public function beginTransaction()
    {
        $this->em->beginTransaction();
    }

    public function commit()
    {
        $this->em->commit();
    }

    protected function preCreate($object)
    {
        return $object;
    }

    public function create(array $data)
    {
        $class = "App\\Model\\".ucfirst($this->getModelName());
        $object = new $class();
        $object = $this->preCreate($object);
        foreach($data as $key=>$value) {
            $set_method = 'set'.ucfirst($key);
            if(method_exists($object, $set_method)) {
                $object->$set_method($value);
            }
        }
        $this->em->persist($object);
        $this->em->flush();

        return $object->getId();

    }

    public function multiCreate(array $data)
    {
        foreach($data as $single) {
            $this->beginTransaction();
            $this->create($single);
        }
        $this->commit();
    }
}