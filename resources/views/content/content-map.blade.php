@extends('layouts.details')

@section('content')

<!-- Google map -->
<div id="map"></div>

<br>
<div class="row card shadow mb-8">
    <div class="card-body">
        <form>
        <div class="form-group">
            <label for="latitude">Latitude:</label>
            <br>
            <input value="{{ Auth::user()->shop->latitude }}" name="latitude" readonly/>
            <br>
            <label for="longitude">Longitude:</label>
            <br>
            <input value="{{ Auth::user()->shop->longitude }}" name="longitude" readonly/>
        </div>
        </form>
    </div>
    </div>
</div>


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
            var latval = {{ Auth::user()->shop->latitude }};
            var lngval = {{ Auth::user()->shop->longitude }};
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