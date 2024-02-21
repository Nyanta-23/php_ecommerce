<?php

class Auth
{
  public static function isLogin()
  {
    if (!isset($_SESSION['auth'])) {
      Redirect::to("Admin/SignIn");
      exit;
    }
  }

  public static function kickFromAuth()
  {
    if (isset($_SESSION['auth'])) {
      Redirect::to("Home");
      exit;
    }
  }
}
