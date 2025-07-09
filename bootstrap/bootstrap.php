<?php
  require_once __DIR__ . '/../error/getError.php';

    $errorHandle = new errorHandler();
    $errorObject = new getError($errorHandle);
    set_exception_handler([$errorObject, 'Exception'] );
    set_error_handler([$errorObject, 'Error'] );
    register_shutdown_function([$errorObject, 'Shutdown'] );

  require_once __DIR__ . '/../config/config.php';
  require_once __DIR__ . '/../container/diContainer.php';
  require_once __DIR__ . '/../database/databaseMysqliHandler.php';
  require_once __DIR__ . '/../database/Database.php';
  require_once __DIR__ . '/../query/queryMysqliHandler.php';
  require_once __DIR__ . '/../query/query.php';
  require_once __DIR__ . '/../repo/createCardRepo.php';
  require_once __DIR__ . '/../service/createCardService.php';
  require_once __DIR__ . '/../controller/createCardController.php';

    $container = new diContainer();

    $container->set('database', function() use ($config){
        $databaseMysqliHandler = databaseMysqliHandler::getInstance($config);
        return new database($databaseMysqliHandler); //database object
    });

    $container->set('query', function() use ($container) {
      $queryMysqliHandler = new queryMysqliHandler($container->get('database'));
      return new query($queryMysqliHandler);
    });

    $container->set('createCardRepo', function() use ($container) {
        return new createCardRepo($container->get('query'));
    });

    $container->set('createCardService', function() use ($container) {
        return new createCardService($container->get('createCardRepo'));
    });

    $container->set('createCardController', function() use ($container) {
      return new createCardController($container->get('createCardService'));
    });


  require_once __DIR__ . '/../router/router.php';
?>
