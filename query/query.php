<?php
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/queryHandlerInterface.php';

class query
{
    private queryHandlerInterface $queryHandler;

    public function __construct(queryHandlerInterface $queryHandler)
    { //import query handler
        $this->queryHandler = $queryHandler;
    }

    public function execute($sql, $params = [])
    {
        return $this->queryHandler->execute($sql, $params);
    }
}
