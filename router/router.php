<?php
$routes = [
  'home' => '/../public/index.php',
  'cardcreation' => '/../card/view/createCard.php',
  'createcard' => '/../card/cardcontroller.php',
  'listallcards' => '/../card/cardcontroller.php',
  'editcard' => '/../card/view/editCard.php',
  'updatecard' => '/../card/cardcontroller.php',
  'deletecard' => '/../card/cardcontroller.php',
  'registeraccount' => '/../user/view/registeraccount.php',
  'registeruser' => '/../user/userController.php',
];

$page = $_GET['page'] ?? 'home';

if (array_key_exists($page, $routes)) {
  require_once __DIR__ . '/' . $routes[$page];

  if ($page === 'createcard') {
    try {
      $controller = $container->get('cardController');
      $controller->createCard();
    } catch (Throwable $e) {
      $errorObject->Exception($e);
    }
  }

  if ($page === 'listallcards') {
    try {
      $controller = $container->get('cardController');
      $controller->listAllCards();
    } catch (Throwable $e) {
      $errorObject->Exception($e);
    }
  }

  if ($page === 'updatecard') {
    try {
      $controller = $container->get('cardController');
      $controller->updateCard();
    } catch (Throwable $e) {
      $errorObject->Exception($e);
    }
  }

  if ($page === 'deletecard') {
    try {
      $controller = $container->get('cardController');
      $controller->deleteCard();
    } catch (Throwable $e) {
      $errorObject->Exception($e);
    }
  }

  if ($page === 'registeruser') {
    try {
      $controller = $container->get('userController');
      $controller->registerUser();
    } catch (Throwable $e) {
      $errorObject->Exception($e);
    }
  }
} else {
  http_response_code(404);
  echo "<h1>404 - Page not found</h1>";
}
