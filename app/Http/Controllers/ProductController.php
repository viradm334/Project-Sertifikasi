<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
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
        $Product = new Product();

        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'stock' => 'required|min:0',
            'price' => 'required|min:0',
            'image' => 'image|file|max:2048',
            'description' => 'required|max:2000'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['stock'] = (int)$validatedData['stock'];
        $validatedData['price'] = (int)$validatedData['price'];

        $insertedId = $Product->insertGetId($validatedData);

        if($request->categories) {
            foreach($request->categories as $category) {
                ProductCategory::create([
                    'product_id' => $insertedId,
                    'category_id' => $category,
                ]);
            }
        }

        return redirect('/dashboard/products')->with('success', 'New product has been created!');
    }


//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
    public function show(Product $product)
    {
        return view('Product', [
            "title" => "More",
            "p" => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $productCategories = $product->categories->pluck('id')->toArray();

        return view('dashboard.products.edit', [
            'product' => $product,
            'productCategories' => $productCategories,
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

        $productCategories = $product->categories->pluck('id')->toArray();

        if(!$request->categories) {
            ProductCategory::where('product_id', $product->id)->delete();
        }else{
            foreach($request->categories as $category) {
                if(!in_array($category, $productCategories)) {
                    ProductCategory::create([
                        'product_id' => $product->id,
                        'category_id' => $category,
                    ]);
                }
            }

            $categoryToRemove = array_diff($productCategories, $request->categories);

            ProductCategory::where('product_id', $product->id)->whereIn('category_id', $categoryToRemove)->delete();
        }

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

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Product $product)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, Product $product)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Product $product)
//     {
//         //
//     }
// }
