<?php

class Order_Model
{
  private $db,
    $table = "order_items";

  public function __construct()
  {
    $this->db = new Database();
  }

  public function addOrderItem($data)
  {

    $query = "INSERT INTO $this->table (quantity, product_id, user_id)
    VALUES (:quantity, :product_id, :user_id)";

    $this->db->query($query);
    $this->db->bind("quantity", $data["quantity"]);
    $this->db->bind("product_id", $data["product_id"]);
    $this->db->bind("user_id", $data["user_id"]);


    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getOrderById($id)
  {
    $query = "SELECT * FROM $this->table WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);

    
    $product = $this->db->fetch();

    return $this->db->rowCount() > 0 ? $product : false;
  }

  public function getAllOrder()
  {
    $query = "SELECT $this->table.*, products.product_img, products.name_product, products.price, products.quantity as product_quantity, users.username, users.first_name, users.last_name, users.email, users.telephone FROM $this->table 
    INNER JOIN products ON $this->table.product_id = products.id 
    INNER JOIN users ON $this->table.user_id = users.id";

    $this->db->query($query);
    
    $product = $this->db->fetchAll();

    return $this->db->rowCount() > 0 ? $product : false;
  }
}
