<?php

namespace Database;
include_once __DIR__ . '/../Constants/Constants.php';


class Database
{

    private $host = HOSTNAME;
    private $dbname = DBNAME;
    private $username = HOSTUSER;
    private $password = HOSTPASS;
    private static $instance = null;
    private $pdo = null;


    public function __construct()
    {
        $this->connect();
    }

    /**
     * Establishing a connection to the database
     * @return void
     */
    private function connect()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE =>\PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->pdo = new \PDO($dsn, $this->username, $this->password, $options);

        } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    /**
     * Create and return the single instance of the class (Singleton).
     * @return Database|null
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Get the PDO connection instance.
     * @return \PDO|null
     */
    public function getConnection()
    {
        return $this->pdo;
    }

    /**
     * Close the PDO connection.
     */
    public function closeConnection()
    {
        $this->pdo = null;
    }

}