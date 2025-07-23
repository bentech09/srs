<?php
interface errorHandlerInterface
{
    public function Exception(Throwable $exception): void;
    public function Error($errno, $errstr, $errfile, $errline): bool;
    public function Shutdown(): void;
}
