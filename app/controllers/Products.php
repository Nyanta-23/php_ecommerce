<?php

class Products extends Controller
{
  private $model = "Products_Model";

  private
    $pathUpload = "img_products/";

  public function index()
  {
    $activePage = is_numeric(array_slice(explode("/", $_SERVER["REQUEST_URI"]), -1)[0]) ? (int) array_slice(explode("/", $_SERVER["REQUEST_URI"]), -1)[0] : 1;

    $dataAmountPerPage = 9;
    $dataAmount = count($this->model($this->model)->getAllProductsByUserId(strval($_SESSION["user"])));

    $amountPage = ceil($dataAmount / $dataAmountPerPage);
    $firstDataEveryOnPage = ($dataAmountPerPage * $activePage) - $dataAmountPerPage;

    $data["products"] = $this->model($this->model)->getAllProductsByUserIdLimit(strval($_SESSION["user"]), $firstDataEveryOnPage, $dataAmountPerPage);

    $data["amount_page"] = $amountPage;
    $data["active_page"] = $activePage;

    $this->viewSeller("Seller/products/index", $data);
  }

  public function addProduct()
  {
    $data["categories"] = $this->model($this->model)->getAllCategories();
    $this->viewSeller("Seller/products/product.create", $data);

    $user_id = strval($_SESSION["user"]);

    if (isset($_POST["submit"])) {
      Redirect::to("/Products/addProduct");
      $image_post = $_FILES["product_image"];


      if (is_uploaded_file($image_post["tmp_name"])) {
        $newNameImage = ManageImage::FilterImage($image_post);

        $data = array(
          ...$_POST,
          "product_img" => $newNameImage,
          "user_id" => $user_id
        );

        // Error 38

        if ($this->model($this->model)->addProduct($data) > 0) {
          ManageImage::SaveImageTo($image_post["tmp_name"], $this->pathUpload . $newNameImage);

          Flasher::setPopUp("add_product", "Menambahkan Produk Sukses!", "Kembali ke Dashboard", "Pemberitahuan", "/products");

          exit;
        } else {

          Flasher::setPopUp("add_product", "Gagal Menambahkan Produk!", "Kembali ke Dashboard", "Pemberitahuan", "/products");
          exit;
        }
      } else {
        Flasher::setPopUp("add_product", "Gagal Mengupload Gambar!", "Kembali ke Dashboard", "Pemberitahuan", "/products");
        exit;
      }
    }
  }

  public function editProduct($id)
  {
    $user_id = strval($_SESSION["user"]);

    $data["products"] = $this->model($this->model)->getAllProductsByIdAndByUserId($id, $user_id);
    $data["categories"] = $this->model($this->model)->getAllCategories();
    $getImage = $data["products"]["product_img"];

    $this->viewSeller("Seller/products/product.edit", $data);

    if (isset($_POST["submit"])) {

      $data = array(...$_POST, "user_id" => $user_id);
      $image_post = $_FILES["product_image"];

      $pathRedirect = "/Products/editProduct/$id";

      Redirect::to($pathRedirect);

      if (is_uploaded_file($image_post["tmp_name"]) && strlen($image_post["tmp_name"]) > 0) {

        $newNameImage = ManageImage::FilterImage($image_post);

        $data = array(
          ...$_POST,
          "product_img" => $newNameImage,
          "user_id" => $user_id
        );

        ManageImage::DeleteImageFrom($this->pathUpload, $getImage);

        if ($this->model($this->model)->editProduct($data) > 0) {
          ManageImage::SaveImageTo($image_post["tmp_name"], $this->pathUpload . $newNameImage);

          Flasher::setPopUp("edit_product", "Mengedit Produk Sukses!", "Kembali ke Dashboard", "Pemberitahuan", "/products");
          exit;
        } else {
          Flasher::setPopUp("edit_product", "Gagal Menambahkan Produk!", "Kembali ke Dashboard", "Pemberitahuan", "/products");
          exit;
        }
      } else {
        $data = array(
          ...$_POST,
          "user_id" => $user_id
        );

        if ($this->model($this->model)->editProduct($data) > 0) {

          Flasher::setPopUp("edit_product", "Mengedit Produk Sukses!", "Kembali ke Dashboard", "Pemberitahuan", "/products");
          exit;
        } else {

          Flasher::setPopUp("edit_product", "Gagal Menambahkan Produk!", "Kembali ke Dashboard", "Pemberitahuan", "/products");
          exit;
        }
      }
    }
  }


  public function deleteProduct($id)
  {
    $user_id = strval($_SESSION["user"]);

    if (isset($id)) {
      $getImage = $this->model($this->model)->getAllProductsByIdAndByUserId($id, $user_id);

      ManageImage::DeleteImageFrom($this->pathUpload, $getImage["product_img"]);
      if ($this->model($this->model)->deleteProduct($id) > 0) {
        Redirect::to("/products");
      }
    }
  }
}
