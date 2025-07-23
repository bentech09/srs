<?php
require_once __DIR__ . '/../error/getError.php';
$errorHandle = new errorHandler();
$errorObject = new getError($errorHandle);
set_exception_handler([$errorObject, 'Exception']);
set_error_handler([$errorObject, 'Error']);
register_shutdown_function([$errorObject, 'Shutdown']);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../container/diContainer.php';
require_once __DIR__ . '/../container/diBootstrap.php';
require_once __DIR__ . '/../router/router.php';
