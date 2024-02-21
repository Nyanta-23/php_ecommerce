<?php

class Admin extends Controller
{

  private
    $modelName = "Admin_Model";

  public function SignIn()
  {

    if (isset($_COOKIE['number']) && isset($_COOKIE['key'])) {

      $id = $_COOKIE['number'];
      $key = $_COOKIE['key'];

      $result = $this->model($this->modelName)->getAccountById($id);

      $cookie = $result['username'] . $result['id_admin'] ;

      if ($key == hash('sha256', $cookie)) {
        $_SESSION['auth'] = $result['id_admin'];
      }
    }

    Auth::kickFromAuth();

    $this->templatesViews("Authentication/signin");

    if ($_POST) {
      if (empty($_POST['email']) || empty($_POST['password'])) {

        Flasher::setFlash("error_input", "Your email or password is empty!", "danger");
        exit;
      } else {

        $account = $this->model($this->modelName)->signIn($_POST);

        if ($account) {

          $_SESSION['auth'] = $account['id_admin'];

          if (isset($_POST['remember'])) {

            $cookie = $account['username'] . $account['id_admin'] ;

            setcookie("number", $account['id_admin'], time() + 60, "/");
            setcookie("key", hash('sha256', $cookie), time() + 60, "/");
          }

          Redirect::to("Home");
          exit;
        } else {
          Flasher::setFlash("error_input", "Your email or password is wrong!", "danger");
          exit;
        }
      }
    }
  }

  public function SignUp()
  {
    Auth::kickFromAuth();

    $this->templatesViews("Authentication/signup");

    $accountError = "account_error";

    if ($_POST) {

      if ($this->model($this->modelName)->getAccountByUsername($_POST['username'])) {
        Flasher::setFlash($accountError, "The account with username " . $_POST['username'] . " has used!", "danger");
        exit;
      } else {
        if ($_POST['password'] != $_POST['confirmPassword']) {

          Flasher::setFlash($accountError, "Your password is not match!", "danger");
          exit;
        } else {

          $filterData = array(
            "id" => htmlspecialchars($_POST['id']),
            "first_name" => htmlspecialchars($_POST['firstName']),
            "last_name" => htmlspecialchars($_POST['lastName']),
            "username" => htmlspecialchars(strtolower($_POST['username'])),
            "email" => htmlspecialchars($_POST['email']),
            "password" => htmlspecialchars($_POST['password'])
          );
          
          if ($this->model($this->modelName)->signUp($filterData) > 0) {
            Flasher::setFlash("account_created", "Your account has created!");
            exit;
          }
        }
      }
    }
  }

  public function SignOut() {
    if($_POST) {
      if(isset($_POST['signout'])) {
        Session::stopSession();
        Redirect::to("Home");
      }
    }
  }
}
