<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\FeaturedCategory;

class featuredController extends Controller
{
    public function View_featured_categories(){
        $categories =category::all();
        $featured_categories =Featuredcategory::all();

        return view ('admin.featured.category',compact('categories','featured_categories'));
    }

    public function store_featured_category(Request $request){

        $category = FeaturedCategory::where('category_id',$request->category_id)->first();

        if($category){
            return redirect('/admin/featured/categories')->with('error','category already add to featured list');
        }
        else{
        $featuredCategory = new FeaturedCategory;
        $featuredCategory->category_id=$request->category_id;
        $featuredCategory->save();

        return redirect('/admin/featured/categories')->with('success','category successfully add to featured categories');

        }
    }


    public function View_featured_courses(){
        return view ('admin.featured.courses');
    }
    public function remove_featured_courses($id){
        $featuredCategory = FeaturedCategory::find($id);
        if($featuredCategory){
            $featuredCategory->delete();
            return redirect('/admin/featured/categories')->with('success','category successfully removed to featured list');

        }
        else{
            return redirect('/admin/featured/categories')->with('error','category not found!');


        }
    }
}
