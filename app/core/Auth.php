<?php

abstract class Auth
{

  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public static function isLoggedIn()
  {
    if (isset($_SESSION['admin_account'])) return true;
  }

  public static function startSession()
  {
    session_start();
  }


  abstract public function getAccount();
  abstract public function signUp();
  abstract public function signIn();
  abstract public function logOut();
}
