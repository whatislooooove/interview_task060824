<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(): string
    {
        $products = DB::table('products')
            ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
            ->paginate(10, ['products.id', 'name', 'description', 'image_path']);
        foreach($products as &$product) {
            $product->image_path = explode(', ', $product->image_path)[0];
        }

        return view('products', compact('products'));
    }

    public function show(Product $product)
    {
        $productInfo = DB::table('products')
            ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
            ->leftJoin('extra_fields', 'products.id', '=', 'extra_fields.product_id')
            ->where('products.id', '=', $product->id)
            ->get();
        $productInfo[0]->image_path = array_filter(explode(', ', $productInfo[0]->image_path));

        return view('show', compact('productInfo'));
    }
}
