<?php
    class crud{
        // Private database object\
        private $db;

        //Constructor to initialize private variable to the database connection\
        function __construct($conn){
            $this->db = $conn;

        }

        public function insertAttendees($firstname, $lastname, $dateofbirth, $emailaddress, $contactnumber, $specialty_id){
            try {
                //Define sql statement to be executed\
                $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth, emailaddress,contactnumber, specialty_id) VALUE (:firstname, :lastname, :dob, :email, :contactnumber, :specialty)";
                //Prepare the sql statement for execution\
                $stmt = $this->db->prepare($sql);
                //bind all the placeholders with actual values\
                $stmt->bindparam(':firstname',$firstname);
                $stmt->bindparam(':lastname',$lastname);
                $stmt->bindparam(':dob',$dateofbirth);
                $stmt->bindparam(':email',$emailaddress);
                $stmt->bindparam(':contactnumber',$contactnumber);
                $stmt->bindparam(':specialty',$specialty_id);

                //Execute statement\
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo  $e->getMessage();
                return false;
            }
        }


        public function editAttendee($id, $firstname, $lastname, $dateofbirth, $emailaddress, $contactnumber, $specialty_id){
        try{
            $sql = "UPDATE `attendee` SET `firstname`= :firstname,`lastname`=:lastname,`dateofbirth`=:dateofbirth,`emailaddress`= :emailaddress,`contactnumber`= :contactnumber,`specialty_id`= :specialty WHERE 
            attendee_id = :id";
    
                //Prepare the sql statement for execution\
                $stmt = $this->db->prepare($sql);
                //bind all the placeholders with actual values\
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':firstname',$firstname);
                $stmt->bindparam(':lastname',$lastname);
                $stmt->bindparam(':dateofbirth',$dateofbirth);
                $stmt->bindparam(':emailaddress',$emailaddress);
                $stmt->bindparam(':contactnumber',$contactnumber);
                $stmt->bindparam(':specialty',$specialty_id);

                //Execute statement\
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo  $e->getMessage();
                return false;
            }
              
            
        }

        
        public function getAttendees(){
            $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
        }

        public function getAttendeeDetails($id){
            $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;

        }

        public function deleteAttendee($id){
            try {
                $sql = "DELETE FROM `attendee` WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo  $e->getMessage();
                return false;
            }

        }

        public function getspecialties(){
            $sql = "SELECT `specialty_id`, `name` FROM `specialties` WHERE 1";
            $result = $this->db->query($sql);
            return $result;
        }
        
    }


?>