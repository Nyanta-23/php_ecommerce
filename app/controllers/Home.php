<?php

class Home extends Controller
{
  public function index()
  {

    Auth::adminAuth();

    $data['title'] = "Dashboard";

    $this->view('Home/index', $data);
  }
}
