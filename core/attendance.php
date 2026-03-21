<?php

class Attendance{

    // db related properties
        private $conn;
        private $table = "attendance";
        private $alias = "a";

    // table fields
        public $attendanceId;
        public $userAccountId;
        public $unitId;
        public $unitTimetableId;
        public $date;
        public $status;
        
    // constructor with db connection
    // a function that is triggered automatically when an instance of the class is created
        public function __construct($db){
            $this->conn = $db;
        }

    // read all attendance records
        public function read(){
            $query = "SELECT * 
                                FROM {$this->table} AS {$this->alias};";

             $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;

        }

}