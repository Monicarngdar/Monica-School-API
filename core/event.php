<?php

class Event{

    // db related properties
        private $conn;
        private $table = "user_calendar";
        private $alias = "u";

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