<?php

class User{

    // db related properties
        private $conn;
        private $table = "user_profile";
        private $alias = "u";

    // table fields
        public $userId;
        public $name;
        public $surname;
        public $email;
        public $date_of_birth;
        public $street1;
        public $street2;
        public $city;
        public $postCode;

    // constructor with db connection
    // a function that is triggered automatically when an instance of the class is created
        public function __construct($db){
            $this->conn = $db;
        }

    // read all user records
        public function read(){
            $query = "SELECT * 
                                FROM {$this->table} AS {$this->alias}
                                ORDER BY {$this->alias}.name ASC;";

             $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;

        }

     //Read a single User record by Id
        public function readSingle(){
            $query = "SELECT * 
                                FROM {$this->table} AS {$this->alias}
                                WHERE {$this->alias}.userId = ?
                                LIMIT 1;";

             $stmt = $this->conn->prepare($query);
             $stmt->bindParam(1, $this->id);
             $stmt->execute();

             $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row > 0){
                    $this->name = $row["name"];
                    $this->surname = $row["surname"];
                    $this->email = $row["email"];
                    $this->date_of_birth = $row["date_of_birth"];
                    $this->street1 = $row["street1"];
                    $this->street2 = $row["street2"];
                    $this->city = $row["city"];
                    $this->postCode= $row["postCode"];
                }

                return $stmt;

        }

        //Create a new User record
       /* public function create(){
            $query = "INSERT INTO {$this->table}
                           (username, firstName, lastname, age)
                           VALUES (:username, :firstName, :lastName, :age);";

            $stmt = $this->conn->prepare($query);

            //clean up the data sent by 3rd party party systems (for security)
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->firstName = htmlspecialchars(strip_tags($this->firstName));
            $this->lastName = htmlspecialchars(strip_tags($this->lastName));
            $this->age = htmlspecialchars(strip_tags($this->age));

            // bind parameters to sql statement
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":firstName", $this->firstName);
            $stmt->bindParam(":lastName", $this->lastName);
            $stmt->bindParam(":age", $this->age);

            if($stmt->execute())
                {
                    return true;
                }

                print_r("Error %s. \n", $stmt->error);
                return false;
        } */
        
}

?>