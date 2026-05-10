<?php

class oauthUser{

    // db related properties
        private $conn;
        private $table = "user_account";
        private $alias = "u";

    // table fields
        public $userId;
        public $roleId;
        public $token;
       

    // constructor with db connection
    // a function that is triggered automatically when an instance of the class is created
        public function __construct($db){
            $this->conn = $db;
        }

        public function authenticate(){

            $query = "SELECT * 
                    FROM {$this->table} AS {$this->alias}
                    WHERE {$this->alias}.token= ?
                    LIMIT 1;";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->token);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row){
                $this->userId = $row["userId"];
                $this->roleId = $row["roleId"];
                $this->token = $row["token"];
   

                return true;
            }

            return false;
        }

    
  
        
}

?>