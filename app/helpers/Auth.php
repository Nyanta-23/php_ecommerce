<?php

class Auth
{
  public static function isLogin()
  {
    if (!isset($_SESSION['Admin_Id'])) {
      Redirect::to("Admin/SignIn");
    }
  }

  public static function kickFromAuth()
  {
    if (isset($_SESSION['Admin_Id'])) {
      Redirect::to("Home");
    }
  }
}
