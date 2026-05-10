<?php

class Unit{

    // db related properties
        private $conn;
        private $table = "unit";
        private $tableus = "unit_student";
        private $alias = "u";
        private $aliasus = "us";

    // table fields
        public $unitId;
        public $courseId;
        public $semester;
        public $unitName;
        public $unitDescription;
        public $studentId;

 
        
    // constructor with db connection
    // a function that is triggered automatically when an instance of the class is created
        public function __construct($db){
            $this->conn = $db;
        }

    // read all units records
        public function read(){
            $query = "SELECT * 
                                FROM {$this->table} AS {$this->alias},
                                {$this->tableus} AS {$this->aliasus}
                                 WHERE {$this->aliasus}.studentId = ?
                                 AND {$this->alias}.unitId = {$this->aliasus}.unitId;";

             $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->studentId);
            $stmt->execute();

            return $stmt;

        }

}