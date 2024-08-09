@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-5 g-4">
            @foreach ($productInfo[0]->image_path as $img)
                <div class="col">
                    <div class="card">
                        <img src="{{$img}}" class="card-img-top" alt="Product image">
                    </div>
                </div>
            @endforeach
        </div>
        <table class="table table-hover my-4">
            <tbody>
            <tr class="table-active">
                <th scope="row">Наименование:</th>
                <td class="table-active">{{$productInfo[0]->name}}</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Описание:</th>
                <td class="table-active">{{$productInfo[0]->description}}</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Цена:</th>
                <td class="table-active">{{$productInfo[0]->price}}</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Скидка:</th>
                <td class="table-active">{{$productInfo[0]->discount}}%</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Размер:</th>
                <td class="table-active">{{$productInfo[0]->size}}</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Цвет:</th>
                <td class="table-active">{{$productInfo[0]->colour}}</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Бренд:</th>
                <td class="table-active">{{$productInfo[0]->brand}}</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Состав:</th>
                <td class="table-active">{{$productInfo[0]->composition}}</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Количество в упаковке:</th>
                <td class="table-active">{{$productInfo[0]->quantity_in_package}}</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Ссылка на упаковку:</th>
                <td class="table-active">{{$productInfo[0]->quantity_url}}</td>
            </tr>
            <tr class="table-active">
                <th scope="row">SEO title:</th>
                <td class="table-active">{{$productInfo[0]->seo_title}}</td>
            </tr>
            <tr class="table-active">
                <th scope="row">SEO H1:</th>
                <td class="table-active">{{$productInfo[0]->seo_h1}}</td>
            </tr>
            <tr class="table-active">
                <th scope="row">SEO description:</th>
                <td class="table-active">{{$productInfo[0]->seo_description}}</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Вес товара:</th>
                <td class="table-active">{{$productInfo[0]->weight}}г</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Ширина:</th>
                <td class="table-active">{{$productInfo[0]->width}}мм</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Высота:</th>
                <td class="table-active">{{$productInfo[0]->height}}мм</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Длина:</th>
                <td class="table-active">{{$productInfo[0]->length}}мм</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Вес упаковки:</th>
                <td class="table-active">{{$productInfo[0]->package_weight}}г</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Ширина упаковки:</th>
                <td class="table-active">{{$productInfo[0]->package_width}}мм</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Высота упаковки:</th>
                <td class="table-active">{{$productInfo[0]->package_height}}мм</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Длина упаковки:</th>
                <td class="table-active">{{$productInfo[0]->package_length}}мм</td>
            </tr>
            <tr class="table-active">
                <th scope="row">Категория товара:</th>
                <td class="table-active">{{$productInfo[0]->category}}мм</td>
            </tr>
        </table>

        <div class="my-3">
            <a href="{{route('product.index')}}">
                <h4>Back</h4>
            </a>
        </div>
    </div>
@endsection
