<?php

class Assignments{

    // db related properties
        private $conn;
        private $table = "assignments";
        private $tableu = "unit";
        private $tableus = "unit_student";
        private $tablec = "course";
        private $alias = "a";
        private $aliasu = "u";
        private $aliasus = "us";
        private $aliasc = "c";

    // table fields
        public $assignmentId;
        public $studentId;
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

    // read all assignments records for the authenticated user, we need to join with four tables to get the assignment of a user
        public function read(){
            $query = "SELECT * 
                                FROM {$this->table} AS {$this->alias},
                                {$this->tableu} AS {$this->aliasu},
                                {$this->tableus} AS {$this->aliasus},
                                {$this->tablec} AS {$this->aliasc}
                                WHERE {$this->aliasus}.studentId = ? 
                                AND {$this->aliasus}.unitId = {$this->aliasu}.unitId
                                AND {$this->alias}.unitId = {$this->aliasu}.unitId
                                AND {$this->aliasc}.courseId = {$this->aliasu}.courseId;";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->studentId);
            $stmt->execute();

            return $stmt;

        }

          

}