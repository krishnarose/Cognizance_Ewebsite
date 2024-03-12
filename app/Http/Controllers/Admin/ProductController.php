<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view("admin.product.index",compact("products"));
    }

    public function create(){
        $categories = Category::all();
        return view("admin.product.create",compact("categories"));
    }

    public function store(Request $request){
        $product = new Product;
        $product->title = $request->title;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->category_id = $request->category_id;
        $product->slug = Str::slug($request->title);
        $product->description = $request->description;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/product/', $filename);
            $product->image = $filename;
        }
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keyword = $request->meta_keyword;
        $product->save();
        return redirect()->route('admin.products')->with('success', 'Product created successfully!');
    }

    public function show($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view("admin.product.view",compact("product", "categories"));
    }

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view("admin.product.edit",compact("product","categories"));
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        if($product){
            $product->title = $request->title;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->discount_price = $request->discount_price;
            $product->category_id = $request->category_id;
            $product->slug = Str::slug($request->title);
            $product->description = $request->description;
            if($request->hasfile('image')){
                $destination = 'uploads/product/'.$product->image;
                if(File::exists($destination)){
                    File::delete($destination);
                }

                $file = $request->file('image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/product/', $filename);
                $product->image = $filename;
            }
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            $product->meta_keyword = $request->meta_keyword;
            $product->update();
            return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
        }
        else{
            return redirect()->route('admin.products')->with('error', 'Product not found!');
        }
    }

    public function destroy($id){
        $product = Product::find($id);
        if($product){
            $destination = 'uploads/product/'.$product->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $product->delete();
            return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
        }
        else{
            return redirect()->route('admin.products')->with('error', 'Product not found!');
        }
    }
}
