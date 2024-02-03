<?php

class Home extends TemplateController
{
  public function index()
  {
    $data['title'] = "Dashboard";

    $this->templates('Home/index', $data);
  }
}
