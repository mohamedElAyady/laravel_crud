@extends('product.layout')

@section('content')
    <div class="jumbotron">
        <p>Trashed products</p>
        <a class="btn btn-primary btn-lg" href="{{route('products.index' )}}" role="button">index</a>
    </div>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">detail</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 0;
              @endphp
             @foreach ($products as $item)
                 <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->detail}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('product.restore',$item->id)}}">Restore</a>
                     
                    <a class="btn btn-danger btn-sm" href="{{route('product.hard.delete',$item->id)}}">Hard Delete</a>
                    
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
          {!!$products->links()!!}
          
    </div>
@endsection