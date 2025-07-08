<?php
    require_once __DIR__ . '/databaseHandlerInterface.php';

    /** @package  */
    class databaseMysqliHandler implements databaseHandlerInterface { 
        private static ?self $instance = null;
        private mysqli $conn;

        private string $host;
        private string $user;
        private string $pass;
        private string $name;

        private function __construct(array $config) {
                $this->host = $config['mysqli']['host'];
                $this->user = $config['mysqli']['user'];
                $this->pass = $config['mysqli']['pass'];
                $this->name = $config['mysqli']['name'];

                $this->conn = new mysqli();
                $this->conn->real_connect($this->host, $this->user, $this->pass, $this->name, NULL, NULL, MYSQLI_CLIENT_SSL | MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
                $this->conn->set_charset("utf8mb4"); 
        }

        public static function getInstance(array $config): self { //singleton
            if (self::$instance == null) {
                self::$instance = new self($config);
            }
            return self::$instance;
        }

        public function getConnection(): mysqli {
            return $this->conn;
        }
    }
?>