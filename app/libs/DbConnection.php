<?php
    class DbConnection {
        private $host;
        private $user;
        private $pass;
        private $dbname;
        private $conn;

        public function __construct() {
            $this->host = DB_HOST;
            $this->user = DB_USER;
            $this->pass = DB_PASS;
            $this->dbname = DB_NAME;

            try {
                $connectionString = "mysql:host=$this->host;dbname=$this->dbname";
                $this->conn = new PDO($connectionString, $this->user, $this->pass);
            } catch (PDOException $th) {
                echo "Connection failed: " . $th->getMessage();
            }

        }

        public function getConnection() : PDO {
            return $this->conn;
        }

    }