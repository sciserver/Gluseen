<!DOCTYPE html>
<html>

<head>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">

</script>

<script>





jQuery(function($) {

    // Asynchronously Load the map API 

    var script = document.createElement('script');

    script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";

    document.body.appendChild(script);

});



function initialize() {

    var map;

    var bounds = new google.maps.LatLngBounds();

    var mapOptions = {

        mapTypeId: 'hybrid'

    };

                    

    // Display a map on the page

    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

    map.setTilt(45);

        

    // Multiple Markers

	//        ['P6_SD', 39.39295,-76.814583],

	//		['P6_N2',39.39383,-76.81443],

	//	['P6_ND',39.39383,-76.81443],

	//

    var markers = [

        ['P6_S', 39.39295,-76.814583],



		['P6_N',39.39383,-76.81443],



		['P5_S',39.3928,-76.81385],



		['P5_N',39.39338,-76.814],



		['PVC',39.3935,-76.8149333],

		['P5_1',39.39226667,-76.81343333],

		['P6_2',39.39221667,-76.81481667],

		['Upstream',39.39413,-76.81433],

		['Confluence',39.39407,-76.81375]

    ];
	var markers2 = [

        ['P6_S, P6_SD', 39.39295,-76.814583,'P6_S: 09/21/2013    P6_SD: 12/02/2013','08/19/2014','P6_S: <a href="/map/P6_S.php">Conductivity Plot</a>    P6_SD: <a href="/map/P6_SD.php">Conductivity Plot</a>'],



		['P6_N, P6_N2, P6_ND',39.39383,-76.81443,'P6_N: 09/21/2013    P6_ND: 12/02/2013','08/19/2014','P6_N: <a href="/map/P6_N.php">Conductivity Plot</a>    P6_ND:<a href="/map/P6_ND.php">Conductivity Plot</a>'],



		['P5_S, P5_SD',39.3928,-76.81385,'P5_S: 09/21/2013    P5_SD: 12/02/2013','08/19/2014','P5_S: <a href="/map/P5_S.php">Conductivity Plot</a>    P5_SD: <a href="/map/P5_SD.php">Conductivity Plot</a>'],



		['P5_N',39.39338,-76.814,'P5_N: 09/21/2013    P5_N2: 07/02/2014','08/19/2014','<a href="/map/P5_N.php">Conductivity Plot</a>'],



		['PVC',39.3935,-76.8149333,'09/21/2013','08/19/2014','<a href="/map/PVC.php">Conductivity Plot</a>'],

		['P5_1',39.39226667,-76.81343333,'09/21/2013','08/19/2014','<a href="/map/P5_1.php">Conductivity Plot</a>'],

		['P6_2',39.39221667,-76.81481667,'09/21/2013','08/19/2014','<a href="/map/P6_2.php">Conductivity Plot</a>'],

		['Upstream',39.39413,-76.81433,'09/21/2013','08/19/2014','<a href="/map/Upstream.php">Conductivity Plot</a>'],

		['Confluence',39.39407,-76.81375,'09/21/2013','08/19/2014','<a href="/map/Confluence.php">Conductivity Plot</a>']

    ];


        

    // Display multiple markers on a map

    var infoWindow = new google.maps.InfoWindow(), marker, i;
	
    

    // Loop through our array of markers & place each one on the map  

    for( i = 0; i < markers.length; i++ ) {

        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);

        bounds.extend(position);

        marker = new google.maps.Marker({

            position: position,

            map: map,

            title: markers[i][0]

        });

        

        // Allow each marker to have an info window    

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
			//map.setZoom(8);
            return function() {
				
				//map.setCenter(marker.getPosition());
				map.panTo(this.getPosition());
				map.setZoom(18);
                //infoWindow.setContent(infoWindowContent[i][0]);
   infoWindow.setContent('<b>Sensor Name:</b> '+markers2[i][0]+'<br><b>Position:</b> '+markers2[i][1]+', '+markers2[i][2]+'<br><b>Start Date:</b> '+markers2[i][3]+'<br><b>End Date:</b> '+markers2[i][4]+'<br>'+markers2[i][5]);
 
                infoWindow.open(map, marker);

            }

        })(marker, i));



        // Automatically center the map fitting all markers on the screen

        map.fitBounds(bounds);

    }



    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)

    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {

        this.setZoom(14);

        google.maps.event.removeListener(boundsListener);

    });

    

}













</script>

<style>

body, html {

  height: 100%;

  width: 100%;

}

#map_wrapper {

    height: 100%;

}



#map_canvas {

    width: auto;

    height: 100%;

}

</style>

</head>


<body>

<?php
//echo "My first PHP script!";
?>  

<div id="map_wrapper">

    <div id="map_canvas" class="mapping"></div>

</div>

</body>
</html>