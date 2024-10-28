<?php
class DatabaseConnection {
    private static $instance;
    private $connection;

    private function __construct() {
        $this->connection = new mysqli('localhost','root','','shoping_cart');
        
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    public function isConnected() {
        return $this->connection->ping(); // Checks if the connection is alive
    }

    // Prevent cloning the instance
    private function __clone() {}

    // Prevent unserializing the instance
    public function __wakeup() {}
}


?>