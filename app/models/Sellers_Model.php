<?php

class Sellers_Model
{
  private
    $db,
    $mainTable = "seller_identity",
    $userTable = "users";

  public function __construct()
  {
    $this->db = new Database();
  }

  public function signUpSeller($data)
  {
    $query = "INSERT INTO $this->mainTable (store_name, address, city_or_regency, province, post_code, user_id) VALUES (:store_name, :address, :city_or_regency, :province, :post_code    , :user_id)";

    $this->db->query($query);
    $this->db->bind("store_name", $data["store_name"]);
    $this->db->bind("address", $data["address"]);
    $this->db->bind("city_or_regency", $data["city_or_regency"]);
    $this->db->bind("province", $data["province"]);
    $this->db->bind("post_code", $data["post_code"]);
    $this->db->bind("user_id", $data["user_id"]);

    $this->db->execute();

    $this->updateUserToBeSeller($data["user_id"]);

    return $this->db->rowCount();
  }

  public function updateUserToBeSeller($id)
  {
    $query = "UPDATE $this->userTable SET seller=1 WHERE id=:id";

    $this->db->query($query);
    $this->db->bind("id", $id);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getStoreNameByStoreName($name)
  {
    $query = "SELECT * FROM $this->mainTable WHERE store_name=:store_name";

    $this->db->query($query);
    $this->db->bind("store_name", $name);

    $store = $this->db->fetch();
    if ($this->db->rowCount() > 0) {
      return $store;
    } else {
      return false;
    }
  }
}
