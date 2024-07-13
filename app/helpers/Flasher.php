<?php

class Flasher
{
  public static function setFlash($session, $msg, $type = '', $action = '')
  {
    $_SESSION[$session] = [
      'message' => $msg,
      'type' => $type,
      'action' => $action
    ];
  }

  public static function FlashMessage($session)
  {
    if (isset($_SESSION[$session])) {
      echo '<div class="text-' . $_SESSION[$session]['type'] . '">' . $_SESSION[$session]['message'] . '</div>';

      unset($_SESSION[$session]);
    }
  }

  public static function setPopUp($session, $msg, $textaction, $head = "", $redirect = "")
  {
    $_SESSION[$session] = [
      "message" => $msg,
      "header" => $head,
      "action" => $textaction,
      "redirect" => $redirect
    ];
  }

  public static function alert($session)
  {
    if (isset($_SESSION[$session])) {

      $link = BASE_URL . "/" . $_SESSION[$session]["redirect"];
      $header = $_SESSION[$session]['header'];
      $message = $_SESSION[$session]['message'];
      $action = $_SESSION[$session]['action'];

      echo '<div class="modal" tabindex="-1" id="alert">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">' . $header . '</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>' . $message . '</p>
                  </div>
                  <div class="modal-footer">
                    <button onclick="return window.location.href=\'' . $link . '\'" type="button" class="btn btn-primary mx-auto">' . $action  . '</button>
                  </div>
                </div>
              </div>
            </div>';

      unset($_SESSION[$session]);
    }
  }

  public static function confirm($session)
  {
    if (isset($_SESSION[$session])) {

      $link = BASE_URL . "/" . $_SESSION[$session]["redirect"];
      $header = $_SESSION[$session]['header'];
      $message = $_SESSION[$session]['message'];
      $action = $_SESSION[$session]['action'];

      echo '<div class="modal" tabindex="-1" id="confirm">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">' . $header . '</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>' . $message . '</p>
                  </div>
                  <div class="modal-footer">
                    <div class="align-self-end">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button onclick="window.location.href=\'' . $link . '\'" type="button" class="btn btn-primary mx-auto">' . $action . '</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>';

      unset($_SESSION[$session]);
    }
  }

  public static function test(){
      echo "<h1 class=\"text-xl\">Kontooooooooool</h1>";
  }
}
