@extends('layout')

@section('content')
 <link rel='stylesheet' type='text/css' href="{{asset('css/tomtom/map.css')}}"/> 
        <script src="{{asset('js/tomtom.min.js')}}"></script> 
            <meta name="csrf-token" content="{{ csrf_token() }}" />

        <style>
          #map {
              height: 90vh;
              width: 100vw;
          }
        </style>
        
<div class="row container">
    <button onclick="clusterPoints()">
        Cluster points
    </button>
	 <div id='map'></div> 
        <script> 

            var lngs = [];
            var lats = [];
            var degrees = [];

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
                marker.bindPopup('Earthquake alert' + i);
                // marker.openPopup();
                console.log("Marker added");
                i++;
            }

            setInterval(function() {
                var randLat = (Math.random() * (maxLat - minLat) + minLat).toFixed(7);
                var randLng = (Math.random() * (maxLng - minLng) + minLng).toFixed(7);
                var minDegree = 0;
                var maxDegree = 5;
                var randomDegree = Math.floor(Math.random() * (maxDegree - minDegree) + minDegree);

                lngs.push(randLng);
                lats.push(randLat);
                // degrees.push(randomDegree);

              addMarker(randLat, randLng, randomDegree)
              // console.log(lats);
              // console.log(lngs);
            }, 4000); 

            tomtom.L.polygon([[44.436718,26.100],
                [44.536718,26.100],
                [44.536718,26.200],
                [44.436718,26.300]]).addTo(map);


            function clusterPoints() {
//                 $.post( "http://0.0.0.0:5000/kmeans", { "_token": "{{ csrf_token() }}",
//                 _token: "{{ csrf_token() }}",    dataType: 'jsonp',
// })
//   .done(function( data ) {
//     alert( "Data Loaded: " + data );
//   });
                // $.post( "http://0.0.0.0:5000/kmeans", function( data ) {
                //   alert( "Data Loaded: " + data );
                // });

  //               $.ajax({
  //                   // url: 'http://0.0.0.0:5000/kmeans',
  //           url: 'http://dianarerise.pythonanywhere.com/kmeans',

  //                   type: 'post',
  //                   data: {
  //                       access_token: '{{ csrf_token() }}',
  //                       "_token": "{{ csrf_token() }}",
  //                   },
  //                   headers: {
  //                       // Header_Name_One: 'Header Value One',   //If your header name has spaces or any other char not appropriate
  //                       // "Header Name Two": 'Header Value Two'  //for object property name, use quoted notation shown in second
  //                   },
  //                   dataType: 'json',
  //                   done: function( data ) {
  //   alert( "Data Loaded: " + data );
  // },
  //                   success: function (data) {
  //                       alert("data:");
  //                       alert(data);
  //                       console.info(data);
  //                   }
  //               });

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
                    /* the route pointing to the post function */
                    url: "http://0.0.0.0:5000/kmeans",
                    type: 'POST',
                    // headers: {
                    //     // "Content-Type": "multipart/form-data"
                    //     "Content-Type": "application/json"
                    // },
                    /* send the csrf-token and the input to the controller */
                    // data: {_token: CSRF_TOKEN, message: "hello", lats: "[33]", lngs: "[44]"},
                    data: {message: "hello", lats: JSON.stringify(lats), lngs: JSON.stringify(lngs)},
                    // dataType: 'JSON',
                    dataType: 'json',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        alert(data); 
                    }
                })
     .done(function(data) {
        alert(data);

                // log data to the console so we can see
                console.log(data); 

                // here we will handle errors and validation messages
            });;
            }
        </script> 
</div>

@endsection