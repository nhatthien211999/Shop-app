@extends('layouts.details')

@section('content')

<!-- Google map -->
<div id="map"></div>



@endsection

@section('js')

<script>
    var map;
    var myLatLng;
    $(document).ready(function() {
        geoLocationInit();
    });
        function geoLocationInit() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(success, fail);
            } else {
                alert("Browser not supported");
            }
        }

        function success(position) {
            console.log(position);
            var latval = position.coords.latitude;
            var lngval = position.coords.longitude;
            myLatLng = new google.maps.LatLng(latval, lngval);
            createMap(myLatLng);
        }

        function fail() {
            alert("it fails");
        }
        //Create Map
        function createMap(myLatLng) {
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 12
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map
            });
        }
        //Create marker
        function createMarker(latlng, icn, name) {
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: icn,
                title: name
            });
        }
    </script>
@endsection