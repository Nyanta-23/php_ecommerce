<?php

class Session
{
  public static function startSession()
  {
    session_start();
  }

  public static function stopSession()
  {
    session_destroy();
  }

  public static function getSession($session) {
    if(!isset($session)) return true;
  }

}
