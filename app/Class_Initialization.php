<?php

class Class_Initialization
{
  public static function auto_load_files($class, $dirs)
  {
    $class_name = substr($class, strrpos($class, "\\"));

    // var_dump(file_exists("../app/core/App.php"));

    foreach ($dirs as $dir) {
      $classes = "../app/$dir/" . $class_name . ".php";
      if (file_exists($classes)) {
        require_once $classes;
      }
    }
  }
}
