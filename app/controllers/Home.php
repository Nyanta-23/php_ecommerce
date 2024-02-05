<?php

class Home extends Controller
{
  public function index()
  {
    $data['title'] = "Dashboard";

    $this->view('Home/index', $data);
  }
}
