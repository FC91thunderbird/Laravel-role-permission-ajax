<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'cat_id'];

    function setNameAttribute($name){
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }


    function category(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }

    function product(){
        return $this->belongsTo(Product::class, 'id', 'sub_id');
    }
}
