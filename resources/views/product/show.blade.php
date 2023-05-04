@extends('product.layout')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <p>Product name : {{$product->name}}</p>
        </div>
        <div class="form-group">
            <label>name : {{$product->name}}</label>
          </div>
           <div class="form-group">
            <label >price : {{$product->price}}</label>
           </div>
          <div class="form-group">
            <label >detail : {{$product->detail}}</label>
          </div>
    </div>
@endsection