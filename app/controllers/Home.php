<?php

class Home extends Controller
{
  public function index()
  {
    Auth::isLogin();

    $data['title'] = "Dashboard";

    $this->view('Home/index', $data);
  }
}
