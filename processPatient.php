<html>
    <head>
        <meta charset="utf-8"/>
        <script src = 'AmbulanceLocator.js'></script>
    </head>
    <body>
<?php
    require_once "Database.php";
    $db_connection = Database::getConnection();
    date_default_timezone_set('America/New_York');
    $timestamp = date('m/d/y',time());
    
    $latLon = <<< EOBODY
        <form action = "{$_SERVER['PHP_SELF']}" method = "get">
            <input type = "hidden" id = "userLat" name = "userLat">
            <input type = "hidden" id = "userLon" name = "userLon">
            <script type=\"text/javascript\">getUserLocation()</script>
        </form>
        
EOBODY;
    $latitude = 39.437419;
    $longitude = -76.520534;
    
    function getPatientID($db_connection){   
        $randInt = rand();
        $query = "SELECT count(PersonID) from patientinfo where PersonID == {'$randInt'}";
        $res = $db_connection->query($query);
        while($res != 0){
            $randInt = rand();
            $res = $db_connection->query($query);
        }
        return $randInt;
    }
    $randomId = getPatientID($db_connection);
    if(isset($_POST['patientSubmit'])){
        if(isset($_POST["firstName"])){
            $firstName = $_POST["firstName"];
        }else{
            $firstName = "";
        }
        if(isset($_POST["lastName"])){
            $lastName = $_POST["lastName"];
        }else{
            $lastName = "";
        }
        if(isset($_POST["month"]) && isset($_POST["day"]) && isset($_POST["year"])){
            $date = $_POST["month"]."/".$_POST["day"]."/".$_POST["year"];
        }else{
            $date = $timestamp;
        }
        if(isset($_POST["pulse_rate"])){
            $pulse_rate = $_POST["pulse_rate"];
        }else{
            $pulse_rate = 0;
        }
        if(isset($_POST["sbp"])){
            $sbp = $_POST["sbp"];
        }else{
            $sbp = 0;
        }
        if(isset($_POST["dbp"])){
            $dbp = $_POST["dbp"];
        }else{
            $dbp = 0;
        }
        if(isset($_POST["spo2"])){
            $spo2 = $_POST["spo2"];
        }else{
            $spo2 = 0;
        }
        if(isset($_POST["temp"])){
            $temp = $_POST["temp"];
        }else{
            $temp = 0;
        }
        if(isset($_POST["notes"])){
            $notes = $_POST["notes"];
        }else{
            $notes = "";
        }
        
        $stmt = $db_connection->prepare("INSERT INTO patientinfo(PersonID, LastName, FirstName, Address, DateofBirth, Latitude, Longitude) VALUES(?, ?, ?, ?, ?, ?, ?);");
            if ($stmt) {
                $stmt->bind_param("issssdd", $randomId, $lastName, $firstName, $address,$date,$latitude,$longitude);
                $stmt->execute();
                $stmt->close();
            }
        $stmt = $db_connection->prepare("INSERT INTO patientvitals(PersonID, Timestamp, PulseRate, SystolicBP, DiastolicBP, OxygenSaturation, Temperature, Notes) VALUES(?, ?, ?, ?, ?, ?, ?, ?);");
            if ($stmt) {
                $stmt->bind_param("isiiiiis", $randomId,$timestamp,$pulse_rate,$sbp,$dbp,$spo2,$temp,$notes);
                $stmt->execute();
                $stmt->close();
            }
        //risk factors
        if(isset($_POST["age"])){
            $age = $_POST["age"];
        }else{
            $age = 0;
        }
        if(isset($_POST["diabetic"])){
            $diabetic = $_POST["diabetic"];
        }else{
            $diabetic = "";
        }
        if(isset($_POST["hdHistory"])){
            $hdHistory = $_POST["hdHistory"];
        }else{
            $hdHistory = "";
        }
        $stmt = $db_connection->prepare("INSERT INTO patientrisks(PersonID,Age,Diabetic,HistoryOfHeartDisease) VALUES(?, ?, ?, ?);");
            if ($stmt) {
                $stmt->bind_param("iiss", $randomId,$age,$diabetic,$hdHistory);
                $stmt->execute();
                $stmt->close();
            }
        $html = "<p>Patient information has been recorded.</p><br /><br />";
    }else{
        $html = "<p>Oops!! Something went wrong.</p><br /><br />";
    }
        $html .= <<< EOBODY
            <form action = "homepage.php" method = "post">
                <input type = "submit" name = "submit" value = "Return to Home">
            </form>
        </body>
EOBODY;
    echo $html;
    
?>
</html>