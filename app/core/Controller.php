<?php

class Controller
{

  private
    $modelUser = "Users_Model";

  public function templatesViews($view, $data = [])
  {
    require_once "../app/views/$view.php";
  }

  public function view($view, $data = [])
  {
    $this->header();
    $this->templatesViews($view, $data);
    $this->footer();
  }

  public function model($model)
  {
    require_once "../app/models/$model.php";
    return new $model;
  }

  public function header()
  {
    $data["user"] = isset($_SESSION["user"]) ? $this->model($this->modelUser)->getAccountById($_SESSION["user"]) : "";

    $this->templatesViews("templates/header", $data);
  }

  public function footer()
  {
    $this->templatesViews("templates/footer");
  }
}
