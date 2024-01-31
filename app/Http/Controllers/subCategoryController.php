<?php

namespace App\Http\Controllers;

use App\Http\Requests\subCategoryAddRequest;
use App\Http\Requests\subCategoryUpdate;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class subCategoryController extends Controller
{
    function index()
    {
        $subcategories = Subcategory::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.subCategory.subCategory', compact('subcategories'));
    }

    function create(){
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.pages.subCategory.addUpdate', compact('categories'));
    }

    function store(subCategoryAddRequest $request)
    {
        try {
            $input = $request->all();

            if ($image = $request->file('image')) {
                $destinationPath = 'subcategory/';
                $postImage = $image->getClientOriginalName();
                $image->move($destinationPath, $postImage);
                $input['image'] = "$postImage";
            }

            Subcategory::create($input);
            return redirect()->route('subcategory.index')->with(['success'=>true, 'message'=>'SubCategory Added..']);
        } catch (\Exception $e) {
            return redirect()->route('subcategory.index')->with(['success'=>false, 'message'=> 'Sub-Category Not Added..']);
        }
    }

    function edit(Subcategory $subcategory){
        $categories = Category::with('subcategory')->orderBy('name', 'asc')->get();
        return view('admin.pages.subCategory.addUpdate', compact('subcategory', 'categories'));
    }

    function update(subCategoryUpdate $request, Subcategory $subcategory){
        try{
            $input = $request->all();

            if ($image = $request->file('image')) {
                $destinationPath = 'subcategory/';
                $postImage = $image->getClientOriginalName();
                $image->move($destinationPath, $postImage);
                $input['image'] = "$postImage";
            }
            $subcategory->update($input);
            return redirect()->route('subcategory.index')->with(['success'=>false, 'message'=> 'Sub-category Updated..']);
        }catch(\Exception $e){
            return redirect()->back()->with(['success'=>false, 'message'=> 'Sub-category Not Updated..']);
        }
    }

    function destroy($id){
        $subcategory = Subcategory::find($id);
        $subcategory->delete();

        return redirect()->back()->with(['success'=>true, 'message'=> 'Sub-category Deleted..']);
    }
}
