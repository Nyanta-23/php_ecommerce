<?php

class Home extends Controller
{

  public function index()
  {

    $model = $this->model("Home_Model");

    Auth::isLogin();

    $data['title'] = "Dashboard";

    $idAdmin = $_SESSION['auth'];

    $products = $model->getProductCountsById($idAdmin);
    $orders = $model->getOrderCountsById($idAdmin);
    $confirmed = $model->getConfirmedCountsById($idAdmin);

    $data['card_data'] = [
      $model->setData("products", $products, "box-seam-fill", "primary"),
      $model->setData("orders", $orders, "list-check", "warning"),
      $model->setData("confirmed", $confirmed, "check-square-fill", "success"),
    ];

    $this->view('Home/index', $data);
  }
}
