<?php
    include "Database.php";
    
    $db_connection = Database::getConnection();
    function getPatientID(){
        $randInt = random_int();
        $query = "SELECT count(PersonID) from patientinfo where PersonID == {'$randInt'}";
        $result = $db_connection->query($query);
        while($result != 0){
            $randInt = random_int();
            $result = $db_connection->query($query);
        }
        return $randInt;
    }
    if(isset($_POST['vitalsSubmit'])){
        $randomId = getPatientID();
        if(isset($_POST["firstName"])){
            $firstName = $_POST["firstName"];
        }
        if(isset($_POST["lastName"])){
            $lastName = $_POST["lastName"];
        }
        if(isset($_POST["month"]) && isset($_POST["day"]) && isset($_POST["year"])){
            $date = $_POST["month"]."/".$_POST["day"]."/".$_POST["year"];
        }
        if(isset($_POST["pulse_rate"])){
            $pulse_rate = $_POST["pulse_rate"];
        }
        if(isset($_POST["sbp"])){
            $sbp = $_POST["sbp"];
        }
        if(isset($_POST["dbp"])){
            $dbp = $_POST["dbp"];
        }
        if(isset($_POST["spo2"])){
            $spo2 = $_POST["spo2"];
        }
        if(isset($_POST["temp"])){
            $firstName = $_POST["temp"];
        }
        if(isset($_POST["notes"])){
            $firstName = $_POST["notes"];
        }
        
        $stmt = $db_connection->prepare("INSERT INTO patientinfo(PersonID, LastName, FirstName, Address, City, DateofBirth, Latitude, Longitude) VALUES(?, ?, ?, ?);");
            if ($stmt) {
                $stmt->bind_param("isssssii", $randomId, $lastName, $firstName, $address);
                $result = $stmt->execute();
                $stmt->close();
            }
    }
    
?>