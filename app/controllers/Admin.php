<?php

class Admin extends Controller
{

  private
    $model = "Admin_Model";

  public function SignIn()
  {
    $this->templatesViews("Authentication/signin");
  }

  public function SignUp() {
    $this->templatesViews("Authentication/signup");
  }
}
