<?php

class Controller
{

  private
    $modelUser = "Users_Model";


  public function model($model)
  {
    require_once "../app/models/$model.php";
    return new $model;
  }

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

  public function viewSeller($view, $data = [])
  {
    $this->header();
    $this->headerSeller();
    $this->templatesViews($view, $data);
    $this->footerSeller();
    $this->footer();
  }

  private function header()
  {
    $data["user"] = isset($_SESSION["user"]) ? $this->model($this->modelUser)->getUsernameById($_SESSION["user"]) : "";

    $this->templatesViews("templates/header", $data);
  }

  private function footer()
  {
    $this->templatesViews("templates/footer");
  }

  private function headerSeller()
  {
    $this->templatesViews("Seller/template_store/header_seller");
  }

  private function footerSeller()
  {
    $this->templatesViews("Seller/template_store/footer_seller");
  }
}
