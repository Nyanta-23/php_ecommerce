<?php

class Home extends Controller
{
  private $modelUser = "Users_Model";

  public function index()
  {

    $data["products"] = $this->model("Products_Model")->getAllProducts();

    $this->view('Home/index', $data);
  }
}
