<?php

    require_once __DIR__ . '/errorHandlerInterface.php';

    class errorHandler implements errorHandlerInterface {

        public function Exception(Throwable $exception):void {
            error_log( $exception->getMessage() );
            //echo "triggered exception\n"; //new mysqli("localhost", "fault", "fault", "fault_db");
            return;
        }

        public function Error($errno, $errstr, $errfile, $errline): bool {
            error_log("Error [$errno]: $errstr - $errfile:$errline");
            //echo "triggered error\n"; //echo $undefined_var;
            return true;
        }

        public function Shutdown(): void {
            $error = error_get_last();
            if ($error !== null) {
                error_log($error["message"]);
                //echo "Server error"; //exit();
            }
            return;
        }
        
    }

?>