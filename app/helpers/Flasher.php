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

  public static function authMessage($session)
  {
    if (isset($_SESSION[$session])) {
      echo '<div class="text-' . $_SESSION[$session]['type'] . '">' . $_SESSION[$session]['message'] . '</div>';

      unset($_SESSION[$session]);
    }
  }

  public static function alert($session)
  {

    if (isset($_SESSION[$session])) {

      $html = '<div class="modal" id="modal" tabindex="-1" style="transition: width 2s ease-in 1s;">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Alert!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>' . $_SESSION[$session]['message'] . '</p>
          </div>
          <div class="modal-footer text-center d-flex justify-content-center">
            <button type="button" class="btn btn-primary blue-btn" data-bs-dismiss="modal">Go To SignIn?</button>
          </div>
        </div>
      </div>
    </div>';

      echo $html;

      unset($_SESSION[$session]);
    }
  }
}
