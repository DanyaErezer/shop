<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('products.show', compact('product'));
    }

    public function category($category)
    {
        $products = Product::where('category', $category)
            ->where('is_active', true)
            ->get();

        return view('products.category', compact('products', 'category'));
    }
}
