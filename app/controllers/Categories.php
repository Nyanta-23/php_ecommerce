<?php

class Categories extends Controller
{
  public function index()
  {

    $data['title'] = "Category";

    $this->view("Categories/index", $data);
  }
}
