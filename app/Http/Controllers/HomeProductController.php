<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeProductController extends Controller
{
    public function index()
    {
        return view('products', [
            'title' => 'Product',
            'products' => Product::all()
        ]);
    }

    public function show(Category $category)
    {
        return view('categorie', [
            'title' => $category->name,
            'product' => $category->products,
            'category' => $category->name
        ]);
    }

    public function kirim()
    {
        return view('categories', [
            'title' => 'category',
            'category' => Category::all()
        ]);
    }

    public function detail(Product $product)
    {
        return view('Product', [
            "title" => "More",
            "p" => $product
        ]);
    }
} // Add this closing brace



