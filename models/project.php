<?php
  class Project {
    // DB Stuff
    private $conn;
    private $table = 'project';

    // Properties
    public $id;
    public $name;
    public $description;
    public $projectDate;
    public $category;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    public function read(){
      $query = 'SELECT p.id,p.name,p.description,p.category,p.projectDate,i.location
          FROM
          ' . $this->table . ' p
        cross JOIN
          img i on p.id = i.projectID
        group by p.id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Execute query
    $stmt->execute();

    return $stmt;
    }

     // Get Single Category
    public function read_single(){
      // Create query
      $query = 'SELECT p.id,p.name,p.description,p.category,p.projectDate,i.location,p.language,p.db
          FROM
          ' . $this->table . ' p
        cross JOIN
          img i on p.id = i.projectID
        WHERE p.id = ?';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        return $stmt;
    }
      
    
}