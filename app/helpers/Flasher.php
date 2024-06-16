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

  public static function setAlert($session, $msg, $isLogin = false, $id = "")
  {
    $_SESSION[$session] = [
      "message" => $msg,
      "isLogin" => $isLogin,
      "id" => $id
    ];
  }

  public static function authMessage($session)
  {
    if (isset($_SESSION[$session])) {
      echo '<div class="text-' . $_SESSION[$session]['type'] . '">' . $_SESSION[$session]['message'] . '</div>';

      unset($_SESSION[$session]);
    }
  }

  public static function alertSeller($session)
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
              <a href="" class="btn btn-primary blue-btn" data-bs-dismiss="modal">Go To Market</a>
          </div>
        </div>
      </div>
    </div>';

      echo $html;

      unset($_SESSION[$session]);
    }
  }

  public static function alertAuth($session)
  {

    if (isset($_SESSION[$session])) {

      $button = $_SESSION[$session]["isLogin"] == true ? '<button type="button" class="btn btn-primary blue-btn" data-bs-dismiss="modal">Go To SignIn?</button>' : '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      <form action="' . BASE_URL . '/User/SignOut" method="post">
        <input type="hidden" name="signout"/>
        <button type="submit" class="btn btn-danger">Confirm</button>
      </form>
        ';

      $alignContent = $_SESSION[$session]["isLogin"] ? "justify-content-center" : "justify-content-start";

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

          <div class="modal-footer text-center d-flex' . $alignContent . '">
          ' .
        $button
        .
        '
          </div>
          
        </div>
      </div>
    </div>';

      echo $html;

      unset($_SESSION[$session]);
    }
  }
}
