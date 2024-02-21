<?php

class Orders extends Controller
{
  public function index()
  {
    $data['title'] = "Order";

    $this->view("Orders/index", $data);
  }
}
