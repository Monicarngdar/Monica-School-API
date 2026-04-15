<?php

class UnitLecturer{

    // db related properties
        private $conn;
        private $table = "unit_lecturer";
        private $tableUserProfile = "user_profile";
        private $alias = "u";
        private $aliasUserProfile= "p";

    // table fields
        public $unitLecturerId;
        public $lecturerId;
        public $unitId;
        public $lecturerName;
        
    // constructor with db connection
    // a function that is triggered automatically when an instance of the class is created
        public function __construct($db){
            $this->conn = $db;
        }

    // read all lecturer for a unit record
        public function read(){
            $query = "SELECT * 
                                FROM {$this->table} AS {$this->alias}, {$this->tableUserProfile} AS {$this->aliasUserProfile}
                                WHERE {$this->alias}.unitId = ?
                                AND  {$this->alias}.lecturerId = {$this->aliasUserProfile}.userId";

             $stmt = $this->conn->prepare($query);

                   // clean up data sent by user/3rd party system (for security)
            $this->unitId = htmlspecialchars(strip_tags($this->unitId));

             $stmt->bindParam(1, $this->unitId);

            $stmt->execute();

            return $stmt;

        }

}