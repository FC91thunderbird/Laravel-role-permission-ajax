<?php

namespace App\Http\Controllers;

use App\Http\Requests\bannerAdd;
use App\Http\Requests\bannerUpdate;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('id','desc')->paginate(10);
        return view('admin.pages.banner.banner', compact('banners'));
    }

    public function create()
    {
        return view('admin.pages.banner.addUpdate');
    }

    public function store(bannerAdd $request)
    {
        try{
            $input = $request->all();

            if( $image = $request->file('image')){
                $destinationPath = 'banner/';
                $postImage = $image->getClientOriginalName();
                $image->move($destinationPath, $postImage);
                $input['image'] = "$postImage";
            }
            
            Banner::create($input);
            return redirect()->route('banner.index')->with(['success'=>true, 'message'=> "Banner Added.."]);
        }catch(\Exception $e){
            return redirect()->route('banner.index')->with(['success'=>false, 'message'=> 'Banner Not Added..']);
        }
    }

    public function edit(Banner $banner)
    {   
        return view('admin.pages.banner.addUpdate', compact('banner'));
    }

    public function update(bannerUpdate $request, Banner $banner)
    {
        try{
            $input = $request->all();

            if($image = $request->file('image')){
                $destinationPath = 'banner/';
                $postImage = $image->getClientOriginalName();
                $image->move($destinationPath, $postImage);
                $input['image'] = "$postImage";
            }

            $banner->update($input);
            return redirect()->route('banner.index')->with(['success'=>true, 'message'=> 'Banner Updated..' ]);
        }catch(\Exception $e){
            return redirect()->route('banner.index')->with(['success'=> false, 'message'=> 'Banner Updated..']);
        }
    }

    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        $banner->delete();

        return redirect()->back()->with(['success'=>true, 'message'=>'Banner Deleted..']);
    }
}
