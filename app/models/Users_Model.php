<?php

class Users_Model
{
  private
    $table = "users",
    $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function signUp($data)
  {
    $query = "INSERT INTO $this->table (username, password, first_name, last_name, telephone, email) VALUES (:username, :password, :first_name, :last_name, :telephone, :email)";

    $this->db->query($query);
    $this->db->bind('username', $data['username']);
    $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
    $this->db->bind('first_name', $data['first_name']);
    $this->db->bind('last_name', $data['last_name']);
    $this->db->bind('telephone', $data['telephone']);
    $this->db->bind('email', $data['email']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getAccountByUsername($username)
  {

    $query = "SELECT * FROM $this->table WHERE username = :username";

    $this->db->query($query);
    $this->db->bind("username", $username);

    $this->db->execute();

    return $this->db->fetch();
  }

  public function signIn($data)
  {
    $query = "SELECT * FROM $this->table WHERE username = :username";

    $this->db->query($query);
    $this->db->bind("username", $data["username"]);

    $account = $this->db->fetch();

    if ($account) {
      if (password_verify($data["password"], $account["password"])) {
        return $account;
      } else {
        return false;
      }
    }
  }

  public function getAccountById($id)
  {
    $query = "SELECT * FROM $this->table WHERE id = :id";

    $this->db->query($query);
    $this->db->bind("id", isset($id) ? $id : false);

    $account = $this->db->fetch();

    if ($this->db->rowCount() > 0) {
      return $account;
    } else {
      return false;
    }
  }

  public static function getAccountByIdStatic($id)
  {
    $instance = new self();
    return $instance->getAccountById($id);
  }
}
