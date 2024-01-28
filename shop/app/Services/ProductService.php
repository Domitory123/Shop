<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;

class ProductService 
{   
    
 /**
     * Store a newly created resource in storage.
     */
    public static function store($request)
    {
        $data = [
            'description' =>  $request->input('description'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category'),
        ];

        Product::create($data); 
    }

    

}
