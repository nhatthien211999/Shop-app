@extends('layouts.details')

@section('content')
<div class="row card shadow mb-8">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Them SP</h6>
    </div>
    <div class="card-body">
      <x-alert/>
      <div class="table-responsive">
        <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">         
            @csrf
          <div class="form-group">
            <label for="name"> Ten SP:</label>
            <input type="text" class="form-control" name="name" >
            <br>
            <label for="price"> Price:</label>
            <input type="text" class="form-control" name="price">
            <br>
            <label for="description"> Description:</label>
            <input type="text" class="form-control" name="description" >
            <br>
            <label for="image"> Image:</label>
            <br>
            <img id="output" width="150px"/>
            <input type="file" class="form-control" name="image" onchange="loadFile(event)">
            <br>
            <label for="menu_id"> Menu:</label>
            <select name="menu_id" class="form-control">
              <option value="" selected disabled hidden>Choose here</option>
                @foreach ($menus as $menu)
                    <option value={{$menu->id}}> {{$menu->type}}</option>
                @endforeach
            </select>
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
      setTimeout(() => document.getElementById('alert-display').style.display = 'none', 5000);


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