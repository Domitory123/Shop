<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('product.index',compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
 

}
