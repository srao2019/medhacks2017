<?php
  require_once "Database.php";
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="mainstyle.css">

    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApiy_UUGYrlWJ37p1kw9qHRtCdlSVSYsY&callback=initMap">
    </script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src = "AmbulanceLocator.js"></script>
  </head>
  <title>FindEMS</title>
  <body>
    <h1>FindEMS</h1>
    <?php
      $db_connection = Database::getConnection();
    
      function addPins($db){
        $query = "SELECT * from patientInfo;";
        $result = $db->query($query);
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
          $id = $row['PersonID'];
          $res= $db->query("SELECT * from patientvitals where PersonID = '$id';");
          $vitals = encode($res);
          $res= $db->query("SELECT * from patientrisks where PersonID = '$id';");
          $risks = encode($res);
          $name = $row['LastName'].",".$row['FirstName'];
          $lat = $row['Latitude'];
          $lon = $row['Longitude'];
          echo "<script type=\"text/javascript\">
          $( document ).ready(function(){dropPin('$id', '$name', '$lat', '$lon','$vitals','$risks');});</script>";
        }
      }
      function encode($queryResult) : String{
        $data = $queryResult->fetch_assoc();
        return json_encode($data);
      }
      addPins($db_connection);
    ?>
    <div id="map"></div>
    <br />
    <form action = "newPatient.php" method="post">
        <input type ="submit" name = "submit" value = "Add New Patient">
    </form>
  </body>
</html>
