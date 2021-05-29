@extends('layouts.details')

@section('content')
<div class="row card shadow mb-8">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Them SP</h6>
    </div>
    <div class="card-body">
      <x-alert/>
      <div class="table-responsive">
        <form method="POST" action="{{route('shops.store', Auth::user()->id)}}" enctype="multipart/form-data">         
            @csrf
          <div class="form-group">
            <label for="name"> Ten Shop:</label>
            <input type="text" class="form-control" name="name" >
            <br>
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address">
            <br>
            <label for="image">Backgound:</label>
            <input type="file" class="form-control" name="image">
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