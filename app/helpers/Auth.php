<?php

class Auth
{

  public static function adminAuth() {
    if(isset($_SESSION['admin_id'])) {
      return true;
    } else {
      Redirect::to("Admin/SignIn");
    }
  }

  public static function adminGuest() {

  }

}
