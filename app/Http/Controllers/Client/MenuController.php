<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class MenuController extends Controller
{
    public function index($slug){
        $category = Category::where('slug', $slug)->latest()->first();
        $products = Product::where('category_id', $category->id)->get();
        // dd($products);
        // die;
        return view("client.menu",compact('products'));
    }
}
