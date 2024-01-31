<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image'];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name); // Generate and set the slug based on the title
    }

    function subcategory(){
        return $this->hasMany(Subcategory::class,'cat_id','id');
    }

    function product(){
        return $this->belongsTo(Product::class, 'id', 'cat_id');
    }
}
