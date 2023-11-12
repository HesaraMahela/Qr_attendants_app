<?php
// Include the database configuration file
include "conn.php";

$lec_id = $_REQUEST["lec_id"];

// Fetch the marker info from the database
$result = $conn->query("SELECT * FROM `attendance` INNER JOIN student on attendance.st_username = student.st_username INNER JOIN degree on student.degID = degree.degID WHERE attendance.`lec_id` = '$lec_id'");

// Fetch the info-window data from the database
$result2 = $conn->query("SELECT * FROM `attendance` INNER JOIN student on attendance.st_username = student.st_username INNER JOIN degree on student.degID = degree.degID WHERE attendance.`lec_id` = '$lec_id'");

?>

<script>        
function myMap() {
    var map;
	var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
    map.setTilt(50);
        
    // Multiple markers location, latitude, and longitude
    var markers = [
        <?php if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '["'.$row['st_username'].'", '.$row['lat'].', '.$row['lng'].'],';
            }
        }
        ?>
    ];
                        
    // Info window content
    var infoWindowContent = [
        <?php

         if($result2->num_rows > 0){
            while($row = $result2->fetch_assoc()){ ?>
                ['<div class="info_content">' +
                '<h5><?php echo $row['st_name']; ?></h5>' +
                '<h5><?php echo $row['st_no']; ?> | <?php echo $row['batchNo']; ?></h5>' +
                '<p><b><?php echo $row['degName']; ?></b></p>' + '</div>'],
        <?php }
        }
        ?>
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(13);
        google.maps.event.removeListener(boundsListener);
    });

    var center = new google.maps.LatLng(6.821217358775091, 80.03822291268534);
    var circle = new google.maps.Circle({
            center: center,
            map: map,
            radius: 1000,          // IN METERS.
            fillColor: '#0C6EC0',
            fillOpacity: 0.3,
            strokeColor: "#033B6A",
            strokeWeight: 1         // DON'T SHOW CIRCLE BORDER.
        });

    var marker = new google.maps.Marker({
   position:{lat:6.902153370235145 , lng: 79.86048061053953}, // uoc coordinates
   map:map, //Map that we need to add
   title:'University of colombo Faculty of science',
   icon:'college-pin-icon.png',//todo:add a img
   animation: google.maps.Animation.DROP,
   // adding custom icons (Here I used a Flash logo marker)
   draggarble: false// If set to true you can drag the marker
});

    //6.902153370235145, 79.86048061053953
    
}

// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);  
    

 </script>

 <div id="googleMap" style="width:100%;height:600px;"></div>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzn3Dbtgv_oV5GaSrF0fDcjRiL9ckCDp8&callback=myMap"></script>