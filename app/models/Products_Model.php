<?php

class Products_Model
{

  private $db,
    $table = "products",
    $category = "categories";

  public function __construct()
  {
    $this->db = new Database();
  }

  public function addProduct($data)
  {
    $query = "INSERT INTO $this->table (name_product, description, quantity, price, product_img, category_id, user_id)
    VALUES (:name_product, :description, :quantity, :price, :product_img, :category_id, :user_id)";

    $this->db->query($query);
    $this->db->bind("name_product", $data["name_product"]);
    $this->db->bind("description", $data["description"]);
    $this->db->bind("quantity", $data["quantity"]);
    $this->db->bind("price", $data["price"]);
    $this->db->bind("product_img", $data["product_img"]);
    $this->db->bind("category_id", $data["category_id"]);
    $this->db->bind("user_id", $data["user_id"]);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function deleteProduct($id)
  {
    $query = "DELETE FROM $this->table WHERE id=:id";

    $this->db->query($query);
    $this->db->bind("id", $id);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function editProduct($data)
  {
    $query = "UPDATE $this->table 
    SET
    name_product = :name_product,
    description = :description,
    quantity = :quantity,
    price = :price,
    category_id = :category_id,
    user_id = :user_id";

    if (isset($data["product_img"]) && !empty($data["product_img"])) {
      $query .= ", product_img = :product_img";
    }

    $query .= " WHERE id = :id";


    $this->db->query($query);
    $this->db->bind("name_product", $data["name_product"]);
    $this->db->bind("description", $data["description"]);
    $this->db->bind("quantity", $data["quantity"]);
    $this->db->bind("price", $data["price"]);
    $this->db->bind("category_id", $data["category_id"]);
    $this->db->bind("user_id", $data["user_id"]);
    $this->db->bind("id", $data["id"]);

    if (isset($data["product_img"]) && !empty($data["product_img"])) {
      $this->db->bind("product_img", $data["product_img"]);
    }


    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getAllProductsByUserId($user_id)
  {
    $query = "SELECT $this->table.*, $this->category.name_category 
    FROM $this->table
    LEFT JOIN $this->category
    ON $this->table.category_id = $this->category.id
    WHERE user_id = :user_id";

    $this->db->query($query);
    $this->db->bind("user_id", $user_id);

    $products = $this->db->fetchAll();

    return $this->db->rowCount() > 0 ? $products : false;
  }

  public function getAllProductsByUserIdLimit($user_id, $firstData, $amountDataPerPage){
    $query = "SELECT $this->table.*, $this->category.name_category 
    FROM $this->table
    LEFT JOIN $this->category
    ON $this->table.category_id = $this->category.id
    WHERE user_id = :user_id
    LIMIT $firstData, $amountDataPerPage
    ";

    $this->db->query($query);
    $this->db->bind("user_id", $user_id);

    $products = $this->db->fetchAll();

    return $this->db->rowCount() > 0 ? $products : false;
  }

  public function getAllCategories()
  {
    $query = "SELECT * FROM $this->category";

    $this->db->query($query);

    $categories = $this->db->fetchAll();

    return $this->db->rowCount() > 0 ? $categories : false;
  }

  public function getAllProductsByIdAndByUserId($id, $user_id)
  {
    $query = "SELECT $this->table.*, $this->category.name_category 
    FROM $this->table 
    LEFT JOIN $this->category
    ON $this->table.category_id = $this->category.id
    WHERE $this->table.id = :id AND $this->table.user_id = :user_id";

    $this->db->query($query);

    $this->db->bind("user_id", $user_id);
    $this->db->bind("id", $id);

    $getProduct = $this->db->fetch();

    return $this->db->rowCount() > 0 ? $getProduct : false;
  }
}
