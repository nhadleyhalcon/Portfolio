<?php 
  class Database {
    // DB Params
    private $host = 'bcdauo9g7o3hezojdltf-mysql.services.clever-cloud.com';
    private $db_name = 'bcdauo9g7o3hezojdltf';
    private $username = 'ulmpqusxyku72ng0';
    private $password = 'MMzpNmuczdIOTsYyGnzL';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }
?>