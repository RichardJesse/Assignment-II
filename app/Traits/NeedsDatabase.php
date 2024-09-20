<?php

include_once __DIR__ . '/../../autoload.php';

trait NeedsDatabase
{
    /**
     * Returns the singleton connection to the database
     * @return mixed
     */
    public function connectDatabase(){
        $database = \Database\Database::getInstance();
        return $database->getConnection();
    }

}
