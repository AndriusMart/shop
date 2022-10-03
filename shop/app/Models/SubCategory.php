<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['sub_category', 'category_id'];
    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
   
    public function items()
    {
        return $this->hasMany(Items::class,'sub_category_id', 'id');
    }
}
