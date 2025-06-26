<?php
    require_once __DIR__ . '/DatabaseConnectionInterface.php';

    /** @package  */
    class Database { 
        private DatabaseConnectionInterface $connection;

        public function __construct(DatabaseConnectionInterface $connection) {
                $this->connection = $connection;
        }

        public function getConnection(): object {
            return $this->connection->getConnection();
        }
    }
?>