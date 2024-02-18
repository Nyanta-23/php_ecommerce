<?php

class Admin extends Controller
{

  public function SignIn()
  {
    $this->templatesViews("Authentication/signin");

    if (Server_Response::is_post_request()) {
      
      $admin = $this->model("Admin_Model")->signIn($_POST);

      // var_dump($_POST['password']);

      var_dump(password_verify( $_POST['password'], $admin['password'],));

      // if($admin['password'], $_POST['password']) {

      // }

    }
  }

  public function SignUp()
  {
    $this->templatesViews("Authentication/signup");

    $accountError = "account_error";

    if (Server_Response::is_post_request() && $_POST) {

      if ($this->model("Admin_Model")->getAccountAdmin($_POST['username'])) {
        Flasher::setFlash($accountError, "The account with username " . $_POST['username'] . " is existed!", "danger");
        Redirect::to("Admin/SignUp");
        exit;
      } else {
        if ($_POST['password'] != $_POST['confirmPassword']) {

          Flasher::setFlash($accountError, "Your password is not match!", "danger");
          Redirect::to("Admin/SignUp");
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

          if ($this->model("Admin_Model")->signUp($filterData) > 0) {
            Flasher::setFlash("account_created", "Your account has created!");
            Redirect::to("Admin/SignUp");
            exit;
          }
        }
      }
    }
  }
}
