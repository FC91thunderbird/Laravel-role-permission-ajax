<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductAdd;
use App\Http\Requests\ProductUpdate;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'subcategory')->paginate(10);
        return view('admin.pages.product.product', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.product.addUpdate', compact('categories'));
    }

    public function store(ProductAdd $request)
    {
        try{
            $input = $request->all();

            if($image = $request->file('image')){
                $destinationPath = 'product/';
                $postImage = $image->getClientOriginalName();
                $image->move($destinationPath, $postImage);
                $input['image'] = "$postImage";
            }

           Product::create($input);
           return redirect()->route('product.index')->with(['success'=>true, 'message'=>'Product Added Success']);
        }catch(\Exception $e){
            return redirect()->route('product.index')->with(['success'=>false, 'message'=>$e]);
        }
    }

    public function edit(Product $product)
    {
        $categories = Category::with('subcategory')->orderBy('name', 'asc')->get();
        $subcategories = Subcategory::where('id', $product->sub_id)->get();
        return view('admin.pages.product.addUpdate', compact('product', 'categories','subcategories'));
    }

    public function update(ProductUpdate $request, Product $product)
    {
        try{
            $input = $request->all();

            if($image = $request->file('image')){
                $destinationPath = 'product/';
                $postImage = $image->getClientOriginalName();
                $image->move($destinationPath, $postImage);
                $input['image'] = "$postImage";
            }

            $product->update($input);
            return redirect()->route('product.index')->with(['success'=>true, 'message'=>'Product Update Success..']);
        }catch(\Exception $e){
            return redirect()->route('product.index')->with(['success'=>false, 'message'=>'Product Not Update..']);
        }
    }

    
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with(['success'=>true, 'message'=> 'Produce Deleted Successful..']);
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = Subcategory::where('cat_id', $categoryId)->get();
        return response()->json($subcategories);
    }
}
