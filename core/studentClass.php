<?php

class StudentClass{

    // db related properties
        private $conn;
        private $table = "class_student";
        private $alias = "c";

    // table fields
        public $classStudentId;
        public $classId;
        public $studentId;

        
    // constructor with db connection
    // a function that is triggered automatically when an instance of the class is created
        public function __construct($db){
            $this->conn = $db;
        }

    // read the student class records
        public function readSingle(){
            $query = "SELECT * 
                                FROM {$this->table} AS {$this->alias}
                                WHERE {$this->alias}.studentId = ?";

              $stmt = $this->conn->prepare($query);
              $stmt->bindParam(1, $this->classStudentId);

            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row){
                $this->classStudentId = $row["classStudentId"];
                $this->classId = $row["classId"];
                $this->studentId = $row["studentId"];

                return true;
            }

            return false;
        }
}

