<?php

class Assignments{

    // db related properties
        private $conn;
        private $table = "assignments";
        private $alias = "a";

    // table fields
        public $assignmentId;
        public $userId;
        public $unitId;
        public $taskTitle;
        public $taskDescription;
        public $maxMark;
        public $dueDate;
        
    // constructor with db connection
    // a function that is triggered automatically when an instance of the class is created
        public function __construct($db){
            $this->conn = $db;
        }

    // read all assignments records
        public function read(){
            $query = "SELECT * 
                                FROM {$this->table} AS {$this->alias};";

             $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;

        }

}