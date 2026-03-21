<?php

class Unit{

    // db related properties
        private $conn;
        private $table = "unit";
        private $alias = "u";

    // table fields
        public $unitTimetableId;
        public $unitId;
        public $classId;
        public $lecturerId;
        public $room;
        public $day;
        public $startTime;
        public $endTime;
        
    // constructor with db connection
    // a function that is triggered automatically when an instance of the class is created
        public function __construct($db){
            $this->conn = $db;
        }

    // read all timetable records
        public function read(){
            $query = "SELECT * 
                                FROM {$this->table} AS {$this->alias};";

             $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;

        }

}