@extends('layouts.details')

@section('content')
<div class="row card shadow mb-8">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit SP</h6>
    </div>
    <div class="card-body">
      <x-alert/>
      <div class="table-responsive">
        <form method="POST" action="{{route('products.update', $product->id )}}" enctype="multipart/form-data">         
            @csrf
          <div class="form-group">
            <label for="name"> Ten SP:</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
            <br>
            <label for="price"> Price:</label>
            <input type="text" class="form-control" name="price" value="{{ $product->price }}">
            <br>
            <label for="description"> Description:</label>
            <input type="text" class="form-control" name="description" value="{{ $product->description }}">
            <label for="sale"> Sale:</label>
            <input type="text" class="form-control" name="sale" value="{{ $product->sale }}">
            <br>
            <label for="image"> Image:</label>
            <br>
            <img id="output" width="150px" src="{{asset('storage/images/'.$product->image)}}"/>
            <input type="file" class="form-control" name="image" value="{{ $product->image }}" onchange="loadFile(event)">
            <br>
            <label for="menu_id"> Menu:</label>
            <select name="menu_id" class="form-control" selected="{{ $product->menu_id }}">
                @foreach ($menus as $menu)
                    @if ($menu->id == $product->menu_id)
                        <option value={{$menu->id}} selected> {{$menu->type}}</option>
                    @else
                        <option value={{$menu->id}}> {{$menu->type}}</option>
                    @endif
                    
                @endforeach
            </select>
          </div>        
          <div class="form-group">
              <input type="submit" class="form-control btn btn-primary" value="Update" >
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