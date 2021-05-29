@extends('layouts.details')

@section('content')

<div class="row card shadow mb-8">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Them SP</h6>
    </div>
    <div class="card-body">
      <x-alert/>
      <div class="table-responsive">
        <form method="POST" action="{{route('menus.store', Auth()->user()->shop->id)}}" enctype="multipart/form-data">         
            @csrf
            
          <div class="form-group">
            <label for="category_id"> Category:</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value={{$category->id}}> {{$category->type}}</option>
                @endforeach
            </select>
            <br>
            <label for="type"> Ten Menu:</label>
            <input type="text" class="form-control" name="type" >
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