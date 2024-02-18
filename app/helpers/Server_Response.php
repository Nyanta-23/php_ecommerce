<?php

class Server_Response
{
  public static function is_post_request()
  {
    return strtoupper($_SERVER['REQUEST_METHOD'] == 'POST');
  }
}
