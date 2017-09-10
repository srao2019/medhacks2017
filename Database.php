<?php
    class Database {
        private static $host = "localhost";
        private static $user = "dbuser";
        private static $password = "FxC6W61BHGvGfUbP";
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
        
        public static function queryDB(string $query) : string {
            if (!self::$connected) {
                return "Not connected to database";
            } else {
                $result = self::$connection->query($query);
                if (!$result) {
                    die("Query failed: " . self::$connection->error);
                    return "Query failed: " . self::$connection->error;
                } else {
                    return "Query succeeded";
                }
            }
        }
    }
?>