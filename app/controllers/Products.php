<?php

class Products extends Controller
{
  public function index()
  {

    $data['title'] = "Product";

    $this->view("Products/index", $data);
  }
}
