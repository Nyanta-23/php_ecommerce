<?php

class Home extends Controller
{
  private $modelUser = "Users_Model";

  public function index()
  {
    // $data["user"] = $this->model($this->modelUser)->getAccountById($_SESSION["user"]);

    // // Auth::isLogin();

    // $idAdmin = $_SESSION['auth'];

    // $products = $model->getProductCountsById($idAdmin);
    // $orders = $model->getOrderCountsById($idAdmin);
    // $confirmed = $model->getConfirmedCountsById($idAdmin);

    // $data['card_data'] = [
    //   $model->setData("products", $products, "box-seam-fill", "primary"),
    //   $model->setData("orders", $orders, "list-check", "warning"),
    //   $model->setData("confirmed", $confirmed, "check-square-fill", "success"),
    // ];

    $this->view('Home/index');
  }
}
