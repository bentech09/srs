<?php
$routes = [
  'home' => '/../public/index.php',
  'cardcreation' => '/../card/view/createCard.php',
  'createcard' => '/../card/cardcontroller.php',
  'listallcards' => '/../card/cardcontroller.php',
  'editcard' => '/../card/view/editCard.php',
  'updatecard' => '/../card/cardcontroller.php',
];

$page = $_GET['page'] ?? 'home';

if (array_key_exists($page, $routes)) {
  require_once __DIR__ . '/' . $routes[$page];

  if ($page === 'createcard') {
    $controller = $container->get('cardController');
    $controller->createCard();
  }

  if ($page === 'listallcards') {
    $controller = $container->get('cardController');
    $controller->listAllCards();
  }

  if ($page === 'updatecard') {
    $controller = $container->get('cardController');
    $controller->updateCard();
  }
} else {
  http_response_code(404);
  echo "<h1>404 - Page not found</h1>";
}
