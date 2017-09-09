<?php
    class Database {
        private static $host = "localhost";
        private static $user = "webapp";
        private static $password = "s}/Z8M2H*kX^JYg*";
        private static $database = "patientsdb";
    
        private static $connection;
        private static $connected;
    
        private function __construct() { }
    
        public static function connectDB() : string {
            if (self::$connected) self::closeDB();
    
            self::$connection = new mysqli(self::$host, self::$user, self::$password, self::$database);
    
            if (self::$connection->connect_error) {
                die(self::$connection->connect_error);
                self::$connected = false;
                return "Connection failed: " . self::$connection->connect_error;
            } else {
                self::$connected = true;
                return "Connection succeeded";
            }
        }
        public static function getConnection() {
            return self::$connection;
        }

        public static function closeDB() {
            if (self::$connected) {
                self::$connected = false;
                self::$connection->close();
            }
        }
    }
?>