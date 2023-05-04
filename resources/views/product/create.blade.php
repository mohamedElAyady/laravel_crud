@extends('product.layout')

@section('content')
    <div class="container">
        <form action="{{route('products.store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">name</label>
              <input type="text" class="form-control" name="name"  placeholder="product name">
            </div>
             <div class="form-group">
              <label for="exampleFormControlInput1">price</label>
              <input type="text" class="form-control" name="price" placeholder="product pice">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">detail</label>
              <textarea class="form-control" name="detail" rows="3" placeholder="product details"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection