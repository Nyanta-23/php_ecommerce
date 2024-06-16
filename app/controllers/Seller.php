<?php

class Seller extends Controller
{

  private
    $mainModel = "Sellers_Model",
    $userModel = "Users_Model";

  public function beseller()
  {

    if ($_POST) {
      Redirect::to("/Seller/beseller");

      if ($this->model($this->mainModel)->getStoreNameByStoreName($_POST["store_name"])) {
        Flasher::setFlash("seller_error", "The store with name = " . $_POST["store_name"] . " has used!", "danger");
        exit;
      } else {
        $protect = array(
          "id" => htmlspecialchars($_POST['id']),
          "user_id" => htmlspecialchars($_POST['user_id']),
          "telephone" => htmlspecialchars($_POST['telephone']),
          "store_name" => htmlspecialchars($_POST['store_name']),
          "province" => htmlspecialchars($_POST['province']),
          "city_or_regency" => htmlspecialchars($_POST['city_or_regency']),
          "address" => htmlspecialchars($_POST['address']),
          "post_code" => htmlspecialchars($_POST['post_code'])
        );

        if ($this->model($this->mainModel)->signUpSeller($protect) > 0) {
          Flasher::setAlert("seller_success", "Your store has created!", true);
          exit;
        }
      }
    }

    $account = $this->model($this->userModel)->getAccountById($_SESSION["user"]);

    if ($account["seller"] > 0) {
      Redirect::to("/Home");
    } else {
      $user = $this->model($this->userModel)->getAccountById($_SESSION["user"]);
      $userData = array(
        "user_id" => $user["id"],
        "telephone" => $user["telephone"]
      );

      $data["be_seller"] = $userData;

      $this->view("Seller/beseller", $data);
    }
  }

  public function store()
  {
    
  }
}
