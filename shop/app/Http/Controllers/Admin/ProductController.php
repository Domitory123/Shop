<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::get();
        $categories = Category::get();
        return view('admin.product.create', compact('categories','products'));

       // чомусь не підгружаються стилі до бокової менюшки 
        //return view('admin.create',compact('categories','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->validated();
        Product::create($request->all());
        return redirect()->route('product.index');  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request->validated();

        $product->update([
            'description' => $request->description,
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return view('product.show',compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');  
    }
  /**
     * Remove the specified resource from storage.
     */
    public function selectEdit()
    {
        $products = Product::get();
        return view('admin.product.selectEdit', compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function selectDestroy()
    {
        $products = Product::get();
        return view('admin.product.selectDestroy', compact('products'));
    }

  /**
     * Remove the specified resource from storage.
     */
    public function showDestroy(Product $product)
    {
        return view('admin.product.destroy', compact('product'));
    }
}
