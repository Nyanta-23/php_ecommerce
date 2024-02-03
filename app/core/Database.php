<?php

class Database
{
  private
    $host = DB_HOST,
    $username = DB_USER,
    $password = DB_PASS,
    $db_name = DB_NAME;

  private
    $db_handler, //database handler
    $statement;

  public function __construct()
  {
    $data_source_name = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

    // option for optimize database
    $option = [
      PDO::ATTR_PERSISTENT => true, // for keep the connection going
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      $this->db_handler = new PDO($data_source_name, $this->username, $this->password, $option);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function query($query)
  {
    $this->statement = $this->db_handler->prepare($query);
  }

  public function bind($params, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;

        default:
          $type = PDO::PARAM_STR;
      }
    }
    $this->statement->bindValue($params, $value, $type);
  }

  public function execute()
  {
    $this->statement->execute();
  }

  public function fetchAll()
  {
    $this->execute();
    return $this->statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function fetch()
  {
    $this->execute();
    return $this->statement->fetch(PDO::FETCH_ASSOC);
  }

  public function rowCount()
  {
    return $this->statement->rowCount();
  }
}
