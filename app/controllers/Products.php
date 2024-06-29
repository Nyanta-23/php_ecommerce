<?php

class Products extends Controller
{

  private $model = "Products_Model";

  public function index()
  {
    $this->viewSeller("Seller/products/index");
  }

  public function addProduct()
  {
    $data["categories"] = $this->model($this->model)->getAllCategories();

    $user_id = strval($_SESSION["user"]);
    

    if ($_POST) {
      $image_post = $_FILES["product_image"];

      if (is_uploaded_file($image_post["tmp_name"])) {

        $newNameImage = ManageImage::FilterImage($image_post);

        $data = array(
          ...$_POST,
          "product_img" => $newNameImage,
          "user_id" => $user_id
        );

        if($this->model($this->model)->addProduct($data) > 0){ 
        }

      }
    }

    $this->viewSeller("Seller/products/product.create", $data);
  }

  public function editProduct()
  {
  }


}
