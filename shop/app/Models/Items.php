<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    public function getCategory()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function getSubCategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id', 'id');
    }

    const SORT_SELECT = [
        ['price_asc', 'Price 1-9'],
        ['price_desc', 'Price 9-1'],
    ];

}
