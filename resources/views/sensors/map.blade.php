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
            var markerOptions = 
            [
                {
                    icon: tomtom.L.icon({
                        iconUrl: '{{asset("img/markers/marker0.png")}}',
                        iconSize: [30, 34],
                        iconAnchor: [15, 34]
                    })
                },
                {
                    icon: tomtom.L.icon({
                        iconUrl: '{{asset("img/markers/marker1.png")}}',
                        iconSize: [30, 34],
                        iconAnchor: [15, 34]
                    })
                },
                {
                    icon: tomtom.L.icon({
                        iconUrl: '{{asset("img/markers/marker2.png")}}',
                        iconSize: [30, 34],
                        iconAnchor: [15, 34]
                    })
                },
                {
                    icon: tomtom.L.icon({
                        iconUrl: '{{asset("img/markers/marker3.png")}}',
                        iconSize: [30, 34],
                        iconAnchor: [15, 34]
                    })
                },
                {
                    icon: tomtom.L.icon({
                        iconUrl: '{{asset("img/markers/marker4.png")}}',
                        iconSize: [30, 34],
                        iconAnchor: [15, 34]
                    })
                },
                {
                    icon: tomtom.L.icon({
                        iconUrl: '{{asset("img/markers/marker5.png")}}',
                        iconSize: [30, 34],
                        iconAnchor: [15, 34]
                    })
                },
            ];

            // var promenadaMallCoordinates = [44.4784538,26.1014347];
            var bucharestCoordinates = [44.436718,26.100];

            var map = tomtom.L.map('map', {
                key: 'w28PxMg84ludogpqMgwgaGa1CHqd7BPG',
                basePath: '<sdk>',
                // center: promenadaMallCoordinates,
                center: bucharestCoordinates,
                // zoom: 15
                zoom: 11
            });

            // var marker = tomtom.L.marker(promenadaMallCoordinates, markerOptions).addTo(map);
            var marker = tomtom.L.marker(bucharestCoordinates, markerOptions[0]).addTo(map);
            // marker.bindPopup('Promenada Mall').openPopup();

        
            var i=1;
            
            // lat, lng
            // Extreme points Bucharest to generate data
            // Nord 44.4897236,26.0742545
            // Vest 44.4495729,25.9828321
            // Est 44.4628966,26.2171682
            // Sud 44.3765841,26.1300802

            // max lat: 44.49
            // min lat: 44.37
            // max lng: 26.22
            // min lng: 25.98


            var maxLat = 44.49;
            var minLat = 44.37;
            var maxLng = 26.22;
            var minLng = 25.98;
            // var lat = 44.4784538;
            // var lng = 26.1014347;

            function addMarker(lat, lng, degree) {

                var coordinates = [lat, lng];
                console.log("coordinates:");
                console.log(lat);
                console.log(lng);

                var marker = tomtom.L.marker(coordinates, markerOptions[degree]).addTo(map);
                marker.bindPopup('Marker' + i);
                // marker.openPopup();
                console.log("Marker added");
                i++;
            }

            setInterval(function() {
                var randLat = (Math.random() * (maxLat - minLat) + minLat).toFixed(7)
                var randLng = (Math.random() * (maxLng - minLng) + minLng).toFixed(7)
                var minDegree = 0;
                var maxDegree = 5;
                var randomDegree = Math.floor(Math.random() * (maxDegree - minDegree) + minDegree);
              addMarker(randLat, randLng, randomDegree)
            }, 4000); 
        </script> 
</div>

@endsection