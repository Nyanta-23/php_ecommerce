<?php

class Home_Model
{

  private
    $db;


  public function __construct()
  {
    $this->db = new Database();
  }

  public function getProductCountsById($id)
  {
    $query = "SELECT * FROM products WHERE admin_id = :admin_id";

    $this->db->query($query);
    $this->db->bind("admin_id", $id);


    return $this->db->fetchAll();
  }

  public function getOrderCountsById($id)
  {
    $query = "SELECT * FROM orders WHERE admin_id = :admin_id";

    $this->db->query($query);
    $this->db->bind("admin_id", $id);

    return $this->db->fetchAll();
  }

  public function getConfirmedCountsById($id)
  {
    $query = "SELECT * FROM confirmed WHERE admin_id = :admin_id";

    $this->db->query($query);
    $this->db->bind("admin_id", $id);

    return $this->db->fetchAll();
  }

  public function setData($nameParentAssoc, $data, $icon, $color)
  {

    $array = array(
      "$nameParentAssoc" =>
      [
        "data" => $data,
        "card_attachment" => [
          "icon" => $icon,
          "color" => $color
        ]
      ]
    );

    return $array;
  }
}
