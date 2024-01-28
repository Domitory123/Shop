<?php

namespace App\Services;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Cookie;

class CategoryService 
{   
    
 /**
     * Store a newly created resource in storage.
     */
    public static function store($request)
    {
        $category = new Category();  
         
        if (!is_null($request->input('category'))){
            $category->parent_id=$request->input('category');
        }
            
        $category->name=$request->input('name');
        $category->save();  
    }
    

}
