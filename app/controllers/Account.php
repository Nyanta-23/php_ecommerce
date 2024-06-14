<?php

class Account extends Controller{

  private
    $modelUser = "Users_Model";



  public function index() {

    $data["user"] = isset($_SESSION["user"]) ? $this->model($this->modelUser)->getAccountById($_SESSION["user"]) : "";


    $this->view("Account/index", $data);
  }
}