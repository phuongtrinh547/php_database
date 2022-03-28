<?php

declare(strict_types=1);

namespace Src\config;

class ClientRequest
{
   public function query($name)
   {
      if (isset(array_merge($_GET, $_POST)[$name]))
         return array_merge($_GET, $_POST)[$name];
      else {
         error_log("Query string with name '$name' does not exist");
         return null;
      }
   }
}


class Controller
{
   public function model($modelName)
   {
      $modelName = 'Src\Models' . '\\' . $modelName;
      return new $modelName;
   }
   public function render($viewName, $passedData = [])
   {
      require_once './src/views/' . $viewName . '.php';
   }
}

class Router
{
   private array $handlers;
   private $notFoundHandler;
   private const METHOD_GET = 'GET';
   private const METHOD_POST = 'POST';

   public function get($path, $handler): void
   {
      $this->addHandler(self::METHOD_GET, $path, $handler);
   }
   public function post($path, $handler): void
   {
      $this->addHandler(self::METHOD_POST, $path, $handler);
   }
   public function addNotFoundHandler($handler): void
   {
      $this->notFoundHandler = $handler;
   }
   private function addHandler(string $method, string $path, $handler): void
   {
      $this->handlers[$method . $path] = [
         'path' => $path,
         'method' => $method,
         'handler' => $handler
      ];
   }
   public function run(): void
   {
      $requestURI = parse_url($_SERVER['REQUEST_URI']);
      $requestPath = $requestURI['path'];
      $requestMethod = $_SERVER['REQUEST_METHOD'];
      $callback = null;

      // TODO: Select the route will do
      foreach ($this->handlers as $handler) {
         if ($handler['path'] === $requestPath && $handler['method'] === $requestMethod) {
            $callback = $handler['handler'];
         }
      }

      // TODO: Handle route does not exist
      if (!$callback) {
         header("HTTP/1.0 404 Not Found");
         if (!empty($this->notFoundHandler))
            $callback = $this->notFoundHandler;
      }
      call_user_func_array($callback, [new ClientRequest(),  new Controller()]);
   }
}
