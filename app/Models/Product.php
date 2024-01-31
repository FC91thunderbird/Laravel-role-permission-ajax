<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug', 'cat_id', 'sub_id', 'description', 'sell_price', 'buy_price','sku','image'];

    function setTitleAttribute($title){
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    function category(){
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    function subcategory(){
        return $this->belongsTo(Subcategory::class, 'sub_id', 'id');
    }

}
