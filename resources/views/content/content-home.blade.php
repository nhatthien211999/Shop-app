@extends('layouts.home')

@section('content')
    @include('categories.category')
    @include('includes.banner')
    @include('products.product-featured')
    @include('products.latest-product')
    @include('blog.blog')
@endsection