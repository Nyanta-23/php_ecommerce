<?php

class Home extends Controller
{
  private $modelProduct = "Products_Model", $order_model = 'Order_Model';

  public function index()
  {

    $data["products"] = $this->model($this->modelProduct)->getAllProducts();

    $this->view('Home/index', $data);
  }


  public function detailproduct($id)
  {

    $data["product"] = $this->model($this->modelProduct)->getProductById($id);

    $this->view("Products/detail.product", $data);
  }

  public function checkout()
  {
    if (isset($_POST['submit'])) {
      if (!isset($_SESSION['user'])) {
        Redirect::to('/Home');
      }

      $post = array(
        'user_id' => $_SESSION['user'],
        'product_id' => $_POST['id_product'],
        'quantity' => $_POST['quantity']
      );


      if ($this->model($this->order_model)->addOrderItem($post)) {
        Redirect::to('/Home/checkout');

        Flasher::setFlash('add_checkout', 'Menambahkan produk ke checkout!', 'success');
      } else {
        Flasher::setFlash('add_checkout', 'Gagal menambahkan produk ke checkout!', 'danger');
        Redirect::to('/Home');
      }
    }

    $data['products'] = $this->model($this->order_model)->getAllOrder();

    $this->view('Products/checkout', $data);
  }
}
