<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

class User extends Controller
{
  private $modelName = "Users_Model";

  public function SignUp()
  {
    $this->templatesViews("/Authentication/SignUp");

    if ($_POST) {

      Redirect::to("/User/SignUp");

      if ($this->model($this->modelName)->getAccountByUsername($_POST["username"])) {
        Flasher::setFlash("account_error", "The account with username " . $_POST["username"] . " has used!", "danger");
        exit;
      } else {

        if ($_POST["password"] != $_POST["confirmPassword"]) {
          Flasher::setFlash("account_error", "The password is not match!", "danger");
          exit;
        } else {
          $protect = array(
            "id" => htmlspecialchars($_POST['id']),
            "first_name" => htmlspecialchars($_POST['firstName']),
            "last_name" => htmlspecialchars($_POST['lastName']),
            "username" => htmlspecialchars(strtolower($_POST['username'])),
            "email" => htmlspecialchars($_POST['email']),
            "password" => htmlspecialchars($_POST['password']),
            "telephone" => htmlspecialchars($_POST['telephone'])
          );

          if ($this->model($this->modelName)->signUp($protect) > 0) {
            Flasher::setAlert("account_created", "Your account has created!", true);
            exit;
          }
        }
      }
    }
  }

  public function SignIn()
  {

    if (isset($_COOKIE["number"]) && isset($_COOKIE["key"])) {


      $id = $_COOKIE["number"];
      $key = $_COOKIE["key"];

      $result = $this->model($this->modelName)->getAccountById($id);

      $cookie = $result["username"] . $result["id"];

      if ($key == hash("sha256", $cookie)) {
        $_SESSION["user"] = $result["id"];
      }
    }

    $this->templatesViews("/Authentication/SignIn");

    if ($_POST) {

      Redirect::to("/User/SignIn");

      if (empty($_POST["username"]) || empty($_POST["password"])) {
        Flasher::setFlash("error_input", "Your username or password is empty!", "danger");
        exit;
      } else {

        $account = $this->model($this->modelName)->signIn($_POST);

        if ($account) {
          $_SESSION["user"] = $account["id"];

          if (isset($_POST["rememmber"])) {

            $cookie = $account["username"] . $account["id"];

            setcookie("number", $account["id"], time() + 60, "/");
            setcookie("key", hash("sha256", $cookie), time() + 60, "/");
          }

          Redirect::to("/Home");
          exit;
        } else {
          Flasher::setFlash("error_input", "Your username or password is wrong!", "danger");
          exit;
        }
      }
    }
  }

  public function ModalSignOut()
  {
    if (isset($_POST["tosignout"])) {
      Flasher::setAlert("logout", "Are you sure want to logout?");
      Redirect::to("/Home");
    }
  }

  public function SignOut()
  {
    if (isset($_POST["signout"])) {
      Session::stopSession();
      
      Redirect::to("/Home");
    }
  }
}
