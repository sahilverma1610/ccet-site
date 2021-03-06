<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Training & Placement CCET</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="navigation.css">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 75%;
        margin-top: 60px;
        width: 60%;     
      }
      
      #floating-panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

#right-panel {
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

#right-panel select, #right-panel input {
  font-size: 15px;
}

#right-panel select {
  width: 100%;
}

#right-panel i {
  font-size: 12px;
}

      #right-panel {
        height: 75%;
        margin-top: 50px;
        float: right;
        width: 390px;
        overflow: auto;
      }

      #map {
        margin-right: 400px;
      }

      #floating-panel {
        background: #fff;
        padding: 5px;
        font-size: 14px;
        font-family: Arial;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        display: none;
      }

      @media print {
        #map {
          height: 500px;
          margin: 0;
        }

        #right-panel {
          float: none;
          width: auto;
        }
      }
      
    </style>
    </head>
    <body>
	<?php include='header.php'?>
        <div class="container-fluid">
    
        <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav nav-tabs">
            <li><a href="index.html">Home</a></li>
          <li><a href="location.html">Locate Us</a></li>
        </ul>
      </div>
        </div>
    </div>
        
        <div id="floating-panel">
      <strong>Show Route From:</strong>
      <select id="start">
        <option>Select Start Point</option>  
        <option value="Bus Stand Sector 43, ISBT Road, Sector 43 B, Chandigarh, 160047, India">ISBT 43 Chandigarh</option>
        <option value="Chandigarh Railway Station, Daria, Chandigarh, India">Railway Station Chandigarh</option>
        
      </select>
      
    </div>
        <div id="right-panel"></div>
        <div id="map"></div>
    <script>
      var map;
      var marker;
      
      function initMap() {
      var directionsDisplay = new google.maps.DirectionsRenderer;
      var directionsService = new google.maps.DirectionsService;
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 30.727163, lng: 76.808779},
          zoom: 16
        });
      
    marker = new google.maps.Marker({
    position: {lat: 30.727163, lng: 76.808779},
    map: map,
    title: 'Chandigarh College of Engineering and Technology'
  });
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('right-panel'));

  var control = document.getElementById('floating-panel');
  control.style.display = 'block';
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

  var onChangeHandler = function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  };
  document.getElementById('start').addEventListener('change', onChangeHandler);
  document.getElementById('end').addEventListener('change', onChangeHandler);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  var start = document.getElementById('start').value;
  var end = "30.727163, 76.808779";
  directionsService.route({
    origin: start,
    destination: end,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=true&amp;callback=initMap"
    async defer></script>
    <?php include='header.php'?>
	</body>
</html>
