@extends('layouts.app')
@section('content')
    <div class="container">
        @if(count($products) === 0)
            <h2>Database with products is empty</h2>
            <a href="{{route('import.index')}}">
                <h3>Import</h3>
            </a>
        @endif
        <div class="row row-cols-1 row-cols-md-5 g-4">
            @foreach ($products as $item)
                <div class="col">
                    <div class="card">
                        <img src="{{$item->image_path}}" class="card-img-top" alt="Product image">
                        <div class="card-body stretched-link">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <p class="card-text text-truncate">{{$item->description}}</p>
                        </div>
                        <a href="{{route('product.show', $item->id)}}" class="stretched-link"></a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="my-3">
            {{$products->links()}}
        </div>
    </div>
@endsection
