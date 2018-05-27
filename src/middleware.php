<?php
// Application middleware

// Error middleware
$container = $app->getContainer();

$container['errorHandler'] = function ($container) {
  return function ($request, $response, $exception) {
    return $container['response']->withStatus(500)
      ->withHeader('Content-Type', 'text/html')
      ->write('Something went wrong!');
  };
};
