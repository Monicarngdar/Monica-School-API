<?php

class Event{

    // db related properties
        private $conn;
        private $table = "user_calendar";

    // table fields
        public $calendarId;
        public $userId;
        public $eventDate;
        public $eventDescription;
        public $eventType;
  
    // constructor with db connection
    // a function that is triggered automatically when an instance of the class is created
        public function __construct($db){
            $this->conn = $db;
        }

         // Read all User Event records
       public function read(){
        $query = "SELECT * FROM {$this->table} ORDER BY eventDate ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Read a single Event record by calendarId
        public function readSingle(){
            $query = "SELECT * 
                    FROM {$this->table}
                    WHERE calendarId = ?
                    LIMIT 1";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->calendarId);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row){
                $this->calendarId = $row["calendarId"];
                $this->userId = $row["userId"];
                $this->eventDate = $row["eventDate"];
                $this->eventDescription = $row["eventDescription"];
                $this->eventType = $row["eventType"];
            }
        }

      //Create a new User Event record
       public function create(){
            $query = "INSERT INTO {$this->table}
                           (userId, eventDate, eventDescription, eventType)
                           VALUES (:userId, :eventDate, :eventDescription, :eventType);";

            $stmt = $this->conn->prepare($query);

            //clean up the data sent by 3rd party party systems (for security)
            $this->userId = htmlspecialchars(strip_tags($this->userId));
            $this->eventDate = htmlspecialchars(strip_tags($this->eventDate));
            $this->eventDescription = htmlspecialchars(strip_tags($this->eventDescription));
            $this->eventType = htmlspecialchars(strip_tags($this->eventType));

            // bind parameters to sql statement
            $stmt->bindParam(":userId", $this->userId);
            $stmt->bindParam(":eventDate", $this->eventDate);
            $stmt->bindParam(":eventDescription", $this->eventDescription);
            $stmt->bindParam(":eventType", $this->eventType);
    

            if($stmt->execute())
                {
                    return true;
                }

                print_r("Error %s. \n", $stmt->error);
                return false;
        } 
        

}
?>