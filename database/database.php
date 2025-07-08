<?php
    require_once __DIR__ . '/DatabaseHandlerInterface.php';

    /** @package  */
    class database { 
        private databaseHandlerInterface $connection;

        public function __construct(databaseHandlerInterface $connection) { //import database handler
                $this->connection = $connection;
        }

        public function getConnection(): object {
            return $this->connection->getConnection();
        }
    }
?>