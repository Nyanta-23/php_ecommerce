<?php

class Controller
{

  public function templatesViews($view, $data = [])
  {
    require_once "../app/views/$view.php";
  }

  public function view($view, $data = [])
  {
    $this->templatesViews("templates/header", $data);
    $this->templatesViews("templates/navbar", $data);
    $this->templatesViews($view, $data);
    $this->templatesViews("templates/footer", $data);
  }

  public function model($model)
  {
    require_once "../app/models/$model.php";
    return new $model;
  }
}
