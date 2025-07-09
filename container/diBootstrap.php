<?php
    require_once __DIR__ . '/../database/databaseMysqliHandler.php';
    require_once __DIR__ . '/../database/Database.php';
    require_once __DIR__ . '/../query/queryMysqliHandler.php';
    require_once __DIR__ . '/../query/query.php';
    require_once __DIR__ . '/../card/cardRepository.php';
    require_once __DIR__ . '/../card/cardService.php';
    require_once __DIR__ . '/../card/cardController.php';
    require_once __DIR__ . '/../validate/createCardValidate/createCardFormValidator.php';

    
    $container = new diContainer();

    $container->set('database', function() use ($config){
        $databaseMysqliHandler = databaseMysqliHandler::getInstance($config);
        return new database($databaseMysqliHandler); //database object
    });

    $container->set('query', function() use ($container) {
      $queryMysqliHandler = new queryMysqliHandler($container->get('database'));
      return new query($queryMysqliHandler);
    });

    $container->set('cardRepository', function() use ($container) {
        return new cardRepository($container->get('query'));
    });

    $container->set('cardService', function() use ($container) {
        return new cardService($container->get('cardRepository'), $container->get('createCardValidatorInterface'));
    });

    $container->set('cardController', function() use ($container) {
      return new cardController($container->get('cardService'));
    });

    $container->set('createCardValidatorInterface', function() use ($container) {
      return new createCardFormValidator();
    });


?>