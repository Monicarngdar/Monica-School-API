<?php

class Grades{

    // db related properties
        private $conn;
        private $table = "grades";
        private $alias = "g";

    // table fields
        public $userAccountId;
        public $assignmentId;
        public $lecturerUserAccountId;
        public $marksEarned;
        public $lecturerComment;
        public $dateRecorded;
        
    // constructor with db connection
    // a function that is triggered automatically when an instance of the class is created
        public function __construct($db){
            $this->conn = $db;
        }

    // read all grades records
        public function read(){
            $query = "SELECT * 
                                FROM {$this->table} AS {$this->alias};";

             $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;

        }

}