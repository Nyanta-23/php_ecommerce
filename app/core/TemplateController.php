<?php

class TemplateController extends Controller
{
  public function templates($view, $data = [])
  {
    $this->view("templates/header", $data);
    $this->view("templates/navbar", $data);
    $this->view($view, $data);
    $this->view("templates/footer", $data);
  }
}
