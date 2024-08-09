@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('import.index')}}">
            <div class="">
                <h2 class="">Import products</h2>
            </div>
        </a>

        <a href="{{route('product.index')}}">
            <div>
                <h2>Products</h2>
            </div>
        </a>
    </div>
@endsection
