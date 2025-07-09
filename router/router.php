<?php
  $routes = [
    'home' => '/../public/index.php',
    'createcard' => '/../view/createCardView.php',
    'submitcreatecard' => '/../controller/createCardcontroller.php',
  ];

  $page = $_GET['page'] ?? 'home';

  if (array_key_exists($page, $routes)) {
    require_once __DIR__ . '/' . $routes[$page];

    if ($page === 'submitcreatecard') {
      $controller = $container->get('createCardController');
      $controller->submitCreateCard();
    }

  } else {
    http_response_code(404);
    echo "<h1>404 - Page not found</h1>";
  }


?>
