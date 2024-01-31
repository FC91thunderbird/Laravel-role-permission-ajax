<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryAddRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Toastr;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::orderBy('id','desc')->paginate(10);
        return view('admin.pages.category.category', compact('categories'));
    }

    function create(){
        return view('admin.pages.category.addUpdate');
    }

    function store(CategoryAddRequest $request){
        try{
            $input = $request->all();

            if ($image = $request->file('image')) {
                $destinationPath = 'category/';
                $postImage = $image->getClientOriginalName();
                $image->move($destinationPath, $postImage);
                $input['image'] = "$postImage";
            }

            Category::create($input);
            return redirect()->route('category.index')->with(['success'=>true, 'message'=>'Category created successfully']);
        }catch(\Exception $e){
            return redirect()->route('category.create')->with(['success'=> false, 'message'=> 'Category Not created']);
        }
    }

    function edit(Category $category){
        return view('admin.pages.category.addUpdate', compact('category'));
    }

    function update(CategoryUpdateRequest $request, Category $category){
        try{
            $input = $request->all();
            if ($image = $request->file('image')) {
                $destinationPath = 'category/';
                $postImage = $image->getClientOriginalName();
                $image->move($destinationPath, $postImage);
                $input['image'] = "$postImage";
            }

            $category->update($input);
            return redirect()->route('category.index')->with(['success'=>true, 'message'=> 'Category Updated...']);
        }catch(\Exception $e){
            return redirect()->back()->with(['success'=>false, 'message'=> 'Category Not Updated..']);
        }
    }

    function destroy($id){
        $category = Category::find($id);
        $category->delete();

        return redirect()->back()->with(['success'=>true, 'message'=> "Category Deleted.."]);
    }
}
