<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $banners = Banner::all();
        $categories = Category::orderBy('name', 'asc')->get();
        $newArrival = Product::with('category', 'subcategory')->get();
        return view('user.pages.home.home', compact('banners', 'categories','newArrival'));
    }

    function subcategory($catSlug)
    {
        $category = Category::where('slug', $catSlug)->first();
        $subcategories = Subcategory::where('cat_id', $category->id)->get(); 

        $products = Product::all();

        return view('user.pages.home.subcategory', compact('category','subcategories','products'));
    }

    function SubcategoryWiseproducts($subcatSlug){
        $subcategory = Subcategory::where('slug', $subcatSlug)->first();
        $products = Product::with('category', 'subcategory')->where('sub_id', $subcategory->id)->get();
        $newArrival = Product::with('category', 'subcategory')->get();
        return view('user.pages.home.productsList', compact('subcategory','products','newArrival'));
    }

    function singleProduct($productSlug){
        $product = Product::with('category', 'subcategory')->where('slug', $productSlug)->first();
        return view('user.pages.home.singleProduct', compact('product'));
    }
}
