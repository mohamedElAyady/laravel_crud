@extends('product.layout')

@section('content')
    
    <div class="container">
        <div class="jumbotron">
            <a  class="btn btn-primary" href="{{route('products.index')}}">Back</a>
            <p>Product name : {{$product->name}}</p>
        </div>
        <form action="{{route('products.update',$product->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="exampleFormControlInput1">name</label>
              <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="product name">
            </div>
             <div class="form-group">
              <label for="exampleFormControlInput1">price</label>
              <input type="text" class="form-control" name="price" value="{{$product->price}}" placeholder="product pice">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">detail</label>
              <textarea class="form-control" name="detail" rows="3" placeholder="product details">{!!$product->detail  !!}
            </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
@endsection