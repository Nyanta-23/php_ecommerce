<?php

class Admin_Model
{
  private
    $table = "admins",
    $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getAccount($data)
  {
    $query = "SELECT * FROM $this->table WHERE username = :username";
    $this->db->query($query);
    $this->db->bind("username", $data['username']);

    $this->db->execute();

    return $this->db->fetch();
  }

  public function signUp($data)
  {
    $query = "INSERT INTO $this->table VALUES ('', :username, :password, :first_name, :last_name, :email, '')";

    $this->db->query($query);
    $this->db->bind('username', $data['username']);
    $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
    $this->db->bind('first_name', $data['first_name']);
    $this->db->bind('last_name', $data['last_name']);
    $this->db->bind('email', $data['email']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function signIn($data)
  {
    $query = "SELECT * FROM admins WHERE email = :email";

    $this->db->query($query);
    $this->db->bind("email", $data['email']);

    $account = $this->db->fetch();

    if ($account) {
      if (password_verify(htmlspecialchars($data['password']), $account['password'])) {
        return $account;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function logOut()
  {
  }

  public function getAccountByEmail($email)
  {
    $query = "SELECT * FROM admins WHERE email = :email";

    $this->db->query($query);

    $this->db->bind("email", $email);

    $this->db->execute();

    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
