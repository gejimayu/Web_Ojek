<?php
    class Database {
        protected static $connection;

        public function connect() {    
            if(!isset(self::$connection)) {
                $config = parse_ini_file('config.ini'); 
                self::$connection = new mysqli('localhost:3306',$config['username'],$config['password'],$config['dbname']);
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
            return "'" . $connection -> real_escape_string($value) . "'";
        }

        // This will be called at the end of the script.
        public function __destruct()
        {
            mysqli_close(self::$connection);
        }

    }
?>