<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.products.index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products', 
            'stock' => 'required|min:0',
            'category_id' => 'required',
            'price' => 'required|min:0',
            'image' => 'image|file|max:2048',
            'description' => 'required|max:2000'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['stock'] = (int)$validatedData['stock'];
        $validatedData['price'] = (int)$validatedData['price'];

        Product::create($validatedData);

        return redirect('/dashboard/products')->with('success', 'New product has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('dashboard.products.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required',
            'stock' => 'required|min:0',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'price' => 'required|min:0',
            'description' => 'required|max:2000'
        ];

        if($request->slug != $product->slug){
            $rules['slug'] = 'required|unique:products';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($product->image != null){
                Storage::delete($product->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['stock'] = (int)$validatedData['stock'];
        $validatedData['price'] = (int)$validatedData['price'];

        Product::where('id', $product->id)
            ->update($validatedData);

        return redirect('/dashboard/products')->with('success', 'Product has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->image){
            Storage::delete($product->image);
        }

        Product::destroy($product->id);

        return redirect('/dashboard/products')->with('success', 'Product has been successfully deleted!');
    }
}
