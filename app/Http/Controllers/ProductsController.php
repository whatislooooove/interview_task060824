<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController extends Controller
{
    public function index(): string
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function show(Product $product)
    {
        return view('show', compact('product'));
    }
}
