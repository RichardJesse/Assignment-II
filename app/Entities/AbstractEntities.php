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
     * Get the class "basename" of the given object / class.
     *
     * @param  string|object  $class
     * @return string
     */
    public static function classBasename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }


    /**
     * Returns the potential table name for the entity
     * 
     * 
     * @param $class
     * 
     */
    public static function getTableName($class)
    {
        $classLower = strtolower($class);
        $pluralized = $classLower . 's';

        return $pluralized;
    }

    /**
     * 
     * Used to access the Query class for the 
     * Query builder package
     * 
     */
    public static function query()
    {
        $query = new \HemiFrame\Lib\SQLBuilder\Query();
        $entity = new \ReflectionClass(get_called_class());
        $className = $entity->getShortName();

        return $query->from(self::getTableName($className));
    }
}
