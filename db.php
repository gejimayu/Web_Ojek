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
    }
?>