<?php

require_once __DIR__ . "/errorHandlerInterface.php";
require_once __DIR__ . '/errorHandler.php';

class getError
{

    private errorHandlerInterface $error;

    public function __construct(errorHandlerInterface $error)
    {
        $this->error = $error;
    }

    public function Exception($exception)
    {
        return $this->error->Exception($exception);
    }

    public function Error($errno, $errstr, $errfile, $errline)
    {
        return $this->error->Error($errno, $errstr, $errfile, $errline);
    }

    public function Shutdown()
    {
        return $this->error->Shutdown();
    }
}
