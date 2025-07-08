<?php

    interface queryHandlerInterface {
        public function execute($sql, $params); // prepared statements
    }
?>