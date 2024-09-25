<?php

namespace Entities;

class AbstractEntities
{
    use \NeedsDatabase;

    protected $db;

    /**
     * single connection instance for all entities
     */
    public function __construct(){
        $this->db =  $this->connectDatabase();
    }

    public static function query(){
        $query = new \HemiFrame\Lib\SQLBuilder\Query();
        return $query;
    }

}