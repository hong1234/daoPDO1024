<?php
namespace Demo\Dao;
use PDO;

class DbConnect
{
    private static $instance;
    private $connection;

    // private $host = 'localhost';
    // private $user = 'root';
    // private $pass = 'pw';
    // private $name = 'hongtest';

    // The db connection is established in the private constructor.
    // private function __construct()
    // {
    //       $this->connection = new PDO("mysql:host={$this->host};
    //       dbname={$this->name}", $this->user,$this->pass,
    //       array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));  
    // }

    private function __construct()
    {
        try {
            $db = new PDO(
              'mysql:host=127.0.0.1;port=3306;dbname=hongtest', // connect
              'root',     // user name
              'Vuanh--66' // password
            );
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception('Connection failed --: ' . $e->getMessage());
        }
        
        $this->connection = $db;
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}