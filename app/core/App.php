<?php

class App
{

  private
    $controller = "Home",
    $method = "Index",
    $params = [];

  public function __construct()
  {
    $url = $this->parseURL();


    // // redirect when not login
    // Auth::startSession();
    session_start();

    // $_SESSION['admin_account'] = "test";
    // var_dump($_SESSION['admin_account']);

    // if (isset($_SESSION['admin_account'])) {
    if (true) {

      // $_SESSION['admin_account'] = false;

      try {
        //code...
        $pathUri = explode('/', $_SERVER['PHP_SELF']);
        array_shift($pathUri);
        array_pop($pathUri);

        $uri = implode("/", $pathUri);

        if ($uri != '/Admin/SignIn') {
          header('Location: http://' . $_SERVER['HTTP_HOST'] . '/' . $uri . '/Admin/SignIn');
          error_reporting();
          exit();
          die();
        }

      } catch (Exception $e) {
        var_dump($e);
        echo "Caught Exception : " . $e->getMessage();
      }
    }

    // header('Location: http://' . $_SERVER['HTTP_HOST'] . '/' . $uri . '/Admin/SignIn');
    // die();
    // var_dump($_SERVER);

    // controller
    if (isset($url[0]) && file_exists("../app/controllers/$url[0].php")) {
      $this->controller = $url[0];
      unset($url[0]);
    }

    require_once '../app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;


    // method
    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    // params
    if (!empty($url)) {
      $this->params = array_values($url);
    }

    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  private function parseURL()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);

      return $url;
    }
  }
}
