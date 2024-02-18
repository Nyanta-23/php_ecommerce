<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "Class_Initialization.php";

require_once "config/config.php";

spl_autoload_register(function ($class) {
  $data = [
    "helpers",
    "core"
  ];

  Class_Initialization::auto_load_files($class, $data);
});
