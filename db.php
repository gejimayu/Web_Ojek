<?php
    class Database {
        protected static $connection;

        public function connect() {    
            if(!isset(self::$connection)) {
                $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/credentials/config.ini'); 
                self::$connection =
                    new mysqli('localhost:3306',$config['username'],$config['password'],$config['dbname']);
            }

            if(self::$connection === false) {
                die("Connection failed: " . mysqli_connect_error());
            }
            return self::$connection;
        }

        public function query($query) {
            $connection = $this -> connect();
            $result = $connection -> query($query);
            return $result;
        }

        public function select($query) {
            $rows = array();
            $result = $this -> query($query);
            if($result === false) {
                return false;
            }
            while ($row = $result -> fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }

        public function escapeStr($value) {
            $connection = $this -> connect();
            return "'" . htmlspecialchars($connection -> real_escape_string($value)) . "'";
        }

        public function error() {
            $connection = $this -> connect();
            return $connection -> error;
        }
        
        // This will be called at the end of the script.
        public function __destruct()
        {
            if (isset($connection))
                mysqli_close(self::$connection);
        }

    }
?>