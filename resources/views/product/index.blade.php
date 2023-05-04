@extends('product.layout')

@section('content')
    <div class="jumbotron">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="{{route('products.create')}}" role="button">Create</a>
        <a class="btn btn-danger btn-lg" href="{{route('product.trash')}}" role="button">Trash</a>
    </div>
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-primary" role="alert">
                {{$message}}
            </div>
        @endif
     </div> 
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">detail</th>
                <th scope="col" >Actions</th>
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
                    <a class="btn btn-success btn-sm" href="{{route('products.edit',$item->id )}}">Edit</a>
                    <a class="btn btn-secondary btn-sm" href="{{route('soft.delete',$item->id )}}">Soft delete</a>
                    <a class="btn btn-primary btn-sm" href="{{route('products.show',$item->id)}}">Show</a>
                    <form method="POST" action="{{route('products.destroy', $item->id) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
          {!!$products->links()!!}
          
    </div>
@endsection