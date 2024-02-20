<?php

class Home extends Controller
{
  public function index()
  {
    Auth::isLogin();

    $data['title'] = "Dashboard";

    var_dump($_SESSION);

    $this->view('Home/index', $data);
  }
}
