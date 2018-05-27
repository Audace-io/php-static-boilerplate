<?php
use Pug\Facade as PugFacade;

$container = $app->getContainer();

class Renderer {
  private $viewDir;

  public function __construct ($viewDir) {
    $this->viewDir = $viewDir;
  }

  public function render ($viewName, $locals = []) {
    return PugFacade::renderFile($this->viewDir . $viewName . '.pug', $locals);
  }
}

// view renderer
$container['renderer'] = function ($c) {
  $settings = $c->get('settings')['renderer'];
  return new Renderer($settings['views_dir']);
};

// monolog
$container['logger'] = function ($c) {
  $settings = $c->get('settings')['logger'];
  $logger = new Monolog\Logger($settings['name']);
  $logger->pushProcessor(new Monolog\Processor\UidProcessor());
  $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
  return $logger;
};
