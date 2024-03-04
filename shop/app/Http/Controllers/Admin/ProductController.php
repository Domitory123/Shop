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
        $categories = Category::get();
        return view('admin.product.create', compact('categories'));
       // чомусь не підгружаються стилі до бокової менюшки 
        //return view('admin.create',compact('categories','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->validated());
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
        $product->update($request->validated());
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
    public function select()
    {
        $products = Product::paginate(10);
        return view('admin.product.select', compact('products'));
    }

 
  /**
     * Remove the specified resource from storage.
     */
    public function showDestroy(Product $product)
    {
        return view('admin.product.destroy', compact('product'));
    }
}
