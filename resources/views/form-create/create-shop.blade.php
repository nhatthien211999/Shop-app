@extends('layouts.details')

@section('content')
<div class="row card shadow mb-8">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Them SP</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <form method="POST" action="{{route('shops.store', Auth::user()->id)}}" enctype="multipart/form-data" id="creatshop">         
            @csrf
          <div class="form-group">
            <label for="name"> Ten Shop:</label>
            <input type="text" class="form-control" name="name" >
            <br>
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address">
            <br>
            <label for="image">Backgound:</label>
            <br>
            <img id="output" width="150px"/>
            <input type="file" class="form-control" name="image" onchange="loadFile(event)">
            <br>
            <label for="map">Vi Tri Shop:</label>
            <a href="#" class="vt">
              <span class="glyphicon glyphicon-map-marker"></span> Map
            </a>
            <div id="demo">

            </div>
            <br>
          </div>        
          <div class="form-group">
              <input type="submit" class="form-control btn btn-primary" value="ADD" >
          </div>
        
        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>

    var x = document.getElementById("demo");

    $('body').on('click', '.vt', function() {
      getLocation();

    });

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
      } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }
        
    function showPosition(position) {
        x.innerHTML="Latitude: " + position.coords.latitude + 
        "<br>Longitude: " + position.coords.longitude;

        $("<input />").attr("type", "hidden")
                      .attr("name", "latitude")
                      .attr("id", "latitude")
                      .attr("value", position.coords.latitude)
                      .appendTo("#creatshop");
        $("<input />").attr("type", "hidden")
                      .attr("name", "longitude")
                      .attr("id", "longitude")
                      .attr("value", position.coords.longitude)
                      .appendTo("#creatshop");        
    }

    var loadFile = function(event) {
            var reader = new FileReader();

            reader.onload = function(){
            var output = document.getElementById('output');
                output.src = reader.result;
            };

            reader.readAsDataURL(event.target.files[0]);
        };
  </script>
@endsection