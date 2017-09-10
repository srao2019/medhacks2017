let map;

function initMap() {
        var test = {lat: 39.0119, lng: -98.4842};
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: test
        });
}

function dropPin(id,name,latitude,longitude,vitals,risks) {

    let pos = new google.maps.LatLng(latitude, longitude);
    let mark = new google.maps.Marker({
        position: pos,
        icon: "icon.png",
        title: name
    });
    let contentString ='<div class="scrollFix"><div class="row infoWindowRow"><div class="col-sm-7 infoWindowColumnText">' + '<h4>' + name + '</h4>' +
        '<p><strong>Patient Id: </strong>' + id + '</p>' +
        '<p><strong>Vitals: </strong>' + vitals + '</p>' +
        '<p><strong>Risks: </strong>' + risks + '</p></div>' +
        '</div></div></div>';

    let infoWindow = new google.maps.InfoWindow({ content: contentString});

    mark.setMap(map);
    mark.addListener('click', function() { infoWindow.open(map, mark); });
}

function getUserLocation(){
       if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            document.getElementById("userLat").value = lat;
            document.getElementById("userLon").value = lng;
          });
       }
}