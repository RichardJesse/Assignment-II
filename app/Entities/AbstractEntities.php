<?php

namespace Entities;

class AbstractEntities
{
    use \NeedsDatabase;

    protected $db;

    /**
     * single connection instance for all entities
     */
    public function __construct()
    {
        $this->db =  $this->connectDatabase();
    }

    /**
     * gets the pularized name of the class in lowercase
     * 
     * 
     * 
     * 
     */
   public static function pluralizeClassname(string $classname) {
       
        $parts = explode('\\', $classname);
        $class = end($parts);
    
       
        // $classLower = strtolower($class);
    
        
        // $pluralized = $classLower . 's';
    
        return $classname;
    }

    public static function query()
    {
        $query = new \HemiFrame\Lib\SQLBuilder\Query();
        $entity = new \ReflectionClass(get_called_class());
        $entity->getShortName();
        return $query->from(explode('\\', $entity));
    }
}
