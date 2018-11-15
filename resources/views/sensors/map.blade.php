@extends('layout')

@section('content')
 <link rel='stylesheet' type='text/css' href="{{asset('css/tomtom/map.css')}}"/> 
        <script src="{{asset('js/tomtom.min.js')}}"></script> 
        <style>
          #map {
              height: 90vh;
              width: 100vw;
          }
        </style>
        
<div class="row container">
	 <div id='map'></div> 
        <script> 
            var promenadaMallCoordinates = [44.4784538,26.1014347];

            var map = tomtom.L.map('map', {
                key: 'w28PxMg84ludogpqMgwgaGa1CHqd7BPG',
                basePath: '<sdk>',
                center: promenadaMallCoordinates,
                zoom: 15
            });

            var marker = tomtom.L.marker(promenadaMallCoordinates).addTo(map);
            marker.bindPopup('Promenada Mall').openPopup();


            var i=1;

            var lat = 44.4784538;
            var lng = 26.1014347;

            function addMarker(lat, lng) {

                var coordinates = [lat, lng];
                console.log("coordinates:");
                console.log(lat);
                console.log(lng);

                var marker = tomtom.L.marker(coordinates).addTo(map);
                marker.bindPopup('Marker' + i).openPopup();
                console.log("Marker added");
                i++;
            }

            setInterval(function() {
              addMarker(lat+i, lng+i)
            }, 4000); 
        </script> 
</div>

@endsection