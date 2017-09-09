<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="mainstyle.css">
    <script src = "AmbulanceLocator.js"></script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApiy_UUGYrlWJ37p1kw9qHRtCdlSVSYsY&callback=initMap">
    </script>
  </head>
  <title>Ambulance Locator</title>
  <body>
    <h3>Ambulance Locator</h3>
    <form action = "newPatient.php" method="post">
        <input type ="submit" name = "submit" value = "Add New Patient">
    </form>
    <br />
    <div id="map"></div>
  </body>
</html>