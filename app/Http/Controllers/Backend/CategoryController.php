<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showProducts($id){
        $products = Category::find($id)->products;
        return view('backend.products.showProductsByCategoryID', ['products' => $products]);
    }
}
