<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController extends Controller
{
    public function index(): string
    {
        $products = Product::all();
        return 'Products now: ' . count($products);
    }
}
